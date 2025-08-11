<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class GenerateModelsWithMigration extends Command
{
    protected $signature = 'app:gen
        {--user=1 : User ID to assign permissions to}';

    protected $description = 'Generate multiple models with resource controllers, migrations, views, and permissions';

    private const PERMISSION_ACTIONS = ['menu', 'create', 'index', 'edit', 'status', 'delete'];

    public function handle()
    {
        $models = [
            'category' => [
                'id'     => ['type' => 'id', 'options' => []],
                'name'   => ['type' => 'string', 'options' => ['maxLength' => 255]],
                'slug'   => ['type' => 'string', 'options' => ['nullable' => true]],
                'image'  => ['type' => 'string', 'options' => ['nullable' => true, 'maxLength' => 255]],
                'text'   => ['type' => 'text', 'options' => ['nullable' => true]],
                'status' => ['type' => 'boolean', 'options' => ['default' => 0]],
            ],
        ];

        foreach ($models as $model => $fields) {
            try {
                $this->generateModelResources($model, 0);
                $this->createBladeFiles($model);
                $this->createPermissions($model);
                $this->createComponentWithDummyData($model);
                $this->addFieldsToMigration($model, $fields);

                $this->info("✅ Model, migration, views, permissions & component for '{$model}' created successfully.");
            } catch (Exception $e) {
                $this->error("❌ Failed for '{$model}': {$e->getMessage()}");
            }
        }
    }

    private function generateModelResources(string $model, int $type)
    {
        $studlyModel = Str::studly($model);

        // Create model with migration + resource controller
        $this->call('make:model', [
            'name'        => $studlyModel,
            '--migration' => true,
            '--resource'  => true,
        ]);
        if ($type == 1) {
            // Create export/import if requested
            if ($this->option('with-import-export')) {
                $this->call('make:export', [
                    'name'  => "{$studlyModel}Export",
                    '--model' => $studlyModel,
                ]);
                $this->line("📤 Export class created: {$studlyModel}Export");

                $this->call('make:import', [
                    'name'  => "{$studlyModel}Import",
                    '--model' => $studlyModel,
                ]);
                $this->line("📥 Import class created: {$studlyModel}Import");
            }
        }
    }

    private function addFieldsToMigration(string $model, array $fields)
    {
        $migrationFile = $this->getLastMigrationFile();
        if (!$migrationFile) {
            throw new Exception("No migration file found for {$model}");
        }

        $migrationContent = file_get_contents($migrationFile);
        $injectedFields = $this->generateMigrationFields($fields);

        // Inject after $table->id();
        $updatedContent = preg_replace(
            '/(\$table->id\(\);)/',
            "$1\n{$injectedFields}",
            $migrationContent
        );

        file_put_contents($migrationFile, $updatedContent);
    }

    private function generateMigrationFields(array $fields): string
    {
        $lines = [];
        foreach ($fields as $field => $props) {
            $type = $props['type'];

            // Special columns without arguments
            if (in_array($type, ['id', 'timestamps', 'softDeletes', 'rememberToken'])) {
                $lines[] = "\$table->{$type}();";
                continue;
            }

            // Normal columns
            $line = "\$table->{$type}('{$field}'";

            if (!empty($props['options']['maxLength'])) {
                $line .= ", {$props['options']['maxLength']}";
            }
            $line .= ")";

            foreach ($props['options'] ?? [] as $option => $value) {
                if ($option === 'default') {
                    $line .= "->default(" . var_export($value, true) . ")";
                } elseif ($option === 'nullable' && $value) {
                    $line .= "->nullable()";
                } elseif ($option === 'useCurrent' && $value) {
                    $line .= "->useCurrent()";
                }
            }

            $lines[] = $line . ';';
        }
        return implode("\n", $lines);
    }


    private function getLastMigrationFile(): ?string
    {
        $files = glob(database_path('migrations/*.php'));
        return $files ? end($files) : null;
    }

    private function createBladeFiles(string $model)
    {
        $name = strtolower($model);
        $bladeDir = resource_path("views/backend/{$name}");

        if (!File::exists($bladeDir)) {
            File::makeDirectory($bladeDir, 0755, true);
            $this->line("📁 Created: {$bladeDir}");
        }

        $templates = ['create', 'edit', 'show'];

        foreach ($templates as $tpl) {
            $src = resource_path("views/templates/{$tpl}.blade.php");
            $dest = "{$bladeDir}/{$tpl}_{$name}.blade.php";

            if (File::exists($src)) {
                $content = File::get($src);

                // Replace $name assignment inside template
                $content = preg_replace(
                    "/\\\$name\s*=\s*'[^']*';/",
                    "\$name = '{$name}';",
                    $content
                );

                File::put($dest, $content);
                $this->line("📝 Blade created: {$dest}");
            } else {
                $this->warn("⚠ Template not found: {$src}");
            }
        }
    }


    private function createPermissions(string $model)
    {
        $permissions = [];
        foreach (self::PERMISSION_ACTIONS as $action) {
            $permissions[] = Permission::firstOrCreate([
                'name'       => strtolower($model) . '.' . $action,
                'group_name' => strtolower($model),
            ]);
        }

        $user = User::find($this->option('user'));
        if ($user && $user->roles) {
            foreach ($user->roles as $role) {
                $role->givePermissionTo($permissions);
                $this->line("🔑 Permissions assigned to role: {$role->name}");
            }
        } else {
            $this->warn("⚠ No user or roles found for permission assignment.");
        }
    }

    private function createComponentWithDummyData(string $model)
    {
        $formName = Str::studly($model) . 'Form';
        $this->call('make:component', [
            'name' => "backend/backend_component/{$formName}",
        ]);

        $slug = strtolower($model) . '-form';
        $componentPath = resource_path("views/components/backend/backend_component/{$slug}.blade.php");
        $dummyPath = resource_path('views/templates/component-form.blade.php');

        if (File::exists($componentPath) && File::exists($dummyPath)) {
            File::copy($dummyPath, $componentPath);
            $this->line("🧩 Component with dummy data created: {$componentPath}");
        }
    }
}
