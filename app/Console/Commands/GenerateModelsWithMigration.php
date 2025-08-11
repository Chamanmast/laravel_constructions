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
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:gen';

    protected $description = 'Generate multiple models with resource controller methods and migration';

    public function handle()
    {
        // Define the models and their fields with types and options
        $models = [
            'category' => [
                'id' => ['type' => 'id', 'options' => []],
                'name' => ['type' => 'string', 'options' => ['maxLength' => 255]],
                'slug' => ['type' => 'string', 'options' => ['nullable' => true]],
                'image' => ['type' => 'string', 'options' => ['nullable' => true, 'maxLength' => 255]],
                'text' => ['type' => 'text', 'options' => ['nullable' => true]],
                'status' => ['type' => 'boolean', 'options' => ['default' => 0]],
            ],
        ];

        foreach ($models as $model => $fields) {
            $form_name = $model.'Form';
            try {
                // 1. Artisan commands (model, migration, resource controller)
                $this->call('make:model', [
                    'name' => Str::ucfirst($model),
                    '--migration' => true,
                    '--resource' => true,
                ]);

                // Create Export Table
                // $this->call('make:export', [
                //     'name' => Str::ucfirst($model)."Export",
                //     '--model' => Str::ucfirst($model)
                // ]);

                // Create Import Table
                // $this->call('make:import', [
                //     'name' => Str::ucfirst($model)."Import",
                //     '--model' => Str::ucfirst($model)
                // ]);

                // 2. Blade files
                $this->createBladeFiles(strtolower($model));

                // 3. Permissions
                $this->createPermissions($model);

                // 4. Component with dummy data
                $this->createComponentWithDummyData($form_name, strtolower($model));

                // 5. Update migration file with provided schema fields
                $this->addFieldsToMigration($model, $fields);

                $this->info("✔ Model $model, $form_name, and migration created successfully.");
            } catch (Exception $e) {
                $this->error("❌ Error generating code for $model: {$e->getMessage()}");
            }
        }
    }

    protected function addFieldsToMigration($model, $fields)
    {
        // Get the last migration file created
        $migrationFile = $this->getLastMigrationFile();

        // Prepare the fields to be added to the migration
        $fieldLines = '';
        foreach ($fields as $field => $properties) {
            $line = "\$table->{$properties['type']}('{$field}'"; // Start line

            // Add maxLength if it exists
            if (isset($properties['options']['maxLength'])) {
                $maxLength = $properties['options']['maxLength'];
                $line .= ", {$maxLength}"; // Append maxLength
            }
            // Add options
            if (isset($properties['options'])) {
                foreach ($properties['options'] as $option => $value) {
                    if ($option === 'default') {
                        $line .= ")->default({$value}"; // Default value
                    } elseif ($option === 'nullable' && $value) {
                        $line .= ')->nullable('; // Nullable
                    } elseif ($option === 'useCurrent' && $value) {
                        $line .= ')->useCurrent('; // Use current timestamp
                    }
                }
            }

            $line .= ');'; // Close the line with a semicolon
            $fieldLines .= "\n".$line; // Append to field lines
        }

        // Read the migration file content
        $migrationContent = file_get_contents($migrationFile);
        $model = Str::lower(Str::plural($model));
        // Prepare the new content with fields, excluding the default id and timestamps
        $newMigrationContent = preg_replace(
            '/Schema::create\(\s*\'(.*?)\'\s*,\s*function\s*\(Blueprint\s*\$table\)\s*{[^}]*?}/',
            "Schema::create('$model', function (Blueprint \$table) {\n$fieldLines\n}",
            $migrationContent
        );

        // Write the updated content back to the migration file
        file_put_contents($migrationFile, $newMigrationContent);
    }

    protected function getLastMigrationFile()
    {
        $files = glob(database_path('migrations/*.php'));

        return $files ? end($files) : null;
    }

    protected function createBladeFiles($name)
    {
        $bladeDirectory = resource_path("views/backend/{$name}");
        try {
            if (! File::exists($bladeDirectory)) {
                File::makeDirectory($bladeDirectory, 0755, true);
                $this->info("Blade directory created: {$bladeDirectory}");
            }
            $filePaths = [
                'create' => resource_path('views/templates/create.blade.php'),
                'edit' => resource_path('views/templates/edit.blade.php'),
                'show' => resource_path('views/templates/show.blade.php'),
            ];
            foreach ($filePaths as $type => $path) {
                if (File::exists($path)) {
                    $bladeContent = File::get($path);
                    File::put("{$bladeDirectory}/{$type}_{$name}.blade.php", $bladeContent);
                    $this->info("Blade file created: {$bladeDirectory}/{$type}_{$name}.blade.php");
                } else {
                    $this->warn("Template not found: {$path}");
                }
            }
        } catch (Exception $e) {
            $this->error("Unable to create blade files for $name: {$e->getMessage()}");
        }
    }

    protected function createPermissions(string $model)
    {
        try {
            $actions = ['menu', 'create', 'index', 'edit', 'status', 'delete'];
            $permissions = [];

            foreach ($actions as $action) {
                $permissionName = strtolower($model).'.'.$action;
                $permission = Permission::firstOrCreate(['name' => $permissionName, 'group_name' => strtolower($model)]);
                $permissions[] = $permission;
            }

            $user = User::find(1); // It may be better to use Auth::user() if running as logged user
            if ($user && $user->roles) {
                foreach ($user->roles as $role) {
                    $role->givePermissionTo($permissions);
                    $this->info('Permissions assigned to role: '.$role->name);
                }
            } else {
                $this->warn('No authenticated user or user role found.');
            }

            $this->info("Permissions created for model: $model");
        } catch (Exception $e) {
            $this->error("Failed creating permissions for $model: {$e->getMessage()}");
        }
    }

    protected function createComponentWithDummyData($form_name, $model)
    {
        try {
            $this->call('make:component', ['name' => "backend/backend_component/{$form_name}"]);
            $slug = $model.'-form';
            $componentPath = resource_path("views/components/backend/backend_component/{$slug}.blade.php");
            $dummyTemplatePath = resource_path('views/templates/component-form.blade.php'); // Adjust path if needed

            if (File::exists($componentPath)) {
                if (File::exists($dummyTemplatePath)) {
                    $bladeContent = File::get($dummyTemplatePath);
                    File::put($componentPath, $bladeContent);
                    $this->info("Component created with dummy data: {$componentPath}");
                } else {
                    $this->warn("Dummy template file not found: {$dummyTemplatePath}");
                }
            } else {
                $this->error("Failed to create component view: {$componentPath}");
            }
        } catch (Exception $e) {
            $this->error("Failed to create component/dummy for $form_name: ".$e->getMessage());
        }
    }
}
