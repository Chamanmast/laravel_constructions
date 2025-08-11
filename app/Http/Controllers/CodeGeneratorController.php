<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // For logging errors

class CodeGeneratorController extends Controller
{
    public function showForm()
    {
        // Available data types for the dropdown
        $dataTypes = [
            'id', 'string', 'text', 'integer', 'bigInteger', 'boolean', 'date',
            'dateTime', 'time', 'timestamp', 'decimal', 'float', 'double',
            'json', 'longText', 'mediumInteger', 'mediumText', 'smallInteger',
            'tinyInteger', 'foreignId', 'uuid', 'char', 'binary',
            // Add more as needed
        ];

        return view('code_generator.form', compact('dataTypes'));
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'models' => 'required|array|min:1',
            'models.*.name' => 'required|string|regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/', // Valid PHP class name start
            'models.*.fields' => 'nullable|array',
            'models.*.fields.*.name' => 'required_with:models.*.fields|string|regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/', // Valid variable name
            'models.*.fields.*.type' => 'required_with:models.*.fields|string',
            'models.*.fields.*.length' => 'nullable|integer|min:1',
            'models.*.fields.*.default' => 'nullable|string',
            'models.*.fields.*.nullable' => 'nullable|boolean',
            'models.*.fields.*.unsigned' => 'nullable|boolean',
            'models.*.fields.*.foreign_table' => 'nullable|string', // For foreignId
            'models.*.fields.*.on_delete' => 'nullable|string',   // For foreignId (cascade, set null)
        ]);

        $outputMessages = [];
        $errorMessages = [];

        foreach ($validated['models'] as $modelData) {
            $modelName = Str::studly(Str::singular($modelData['name'])); // e.g., CareerLayout
            $tableName = Str::plural(Str::snake($modelData['name'])); // e.g., career_layouts
            $formName = Str::camel($modelName).'Form'; // e.g., careerLayoutForm
            $componentSlug = Str::kebab($modelName).'-form'; // e.g., career-layout-form

            try {
                // 1. Create Model, Migration, Resource Controller
                Artisan::call('make:model', [
                    'name' => $modelName,
                    '--migration' => true,
                    '--resource' => true,
                ]);
                $outputMessages[] = "Model {$modelName}, Migration, and Resource Controller created.";

                // 2. Update Migration
                if (! empty($modelData['fields'])) {
                    $this->addFieldsToMigrationViaController($tableName, $modelData['fields']);
                    $outputMessages[] = "Migration for {$tableName} updated.";
                } else {
                    // If no fields, ensure the migration still creates id and timestamps
                    $this->ensureBasicMigrationStructure($tableName);
                    $outputMessages[] = "Basic migration structure for {$tableName} ensured.";
                }

                // 3. Create Blade Files (assuming templates exist)
                $this->createBladeFilesViaController(Str::snake($modelName));
                $outputMessages[] = 'Blade views for '.Str::snake($modelName).' created.';

                // 4. Create Component
                Artisan::call('make:component', ['name' => "backend/backend_component/{$formName}"]);
                $this->updateComponentWithDummyDataViaController($componentSlug);
                $outputMessages[] = "Component {$formName} created and updated.";

            } catch (\Exception $e) {
                Log::error("Error generating for model {$modelName}: ".$e->getMessage()."\n".$e->getTraceAsString());
                $errorMessages[] = "Error generating for model {$modelName}: ".$e->getMessage();
                // Optionally, attempt cleanup or skip to next model
            }
        }

        if (! empty($errorMessages)) {
            return redirect()->route('code-generator.show')
                ->with('error', implode('<br>', $errorMessages))
                ->with('success_details', implode('<br>', $outputMessages)) // Show successes even if some errors
                ->withInput();
        }

        return redirect()->route('code-generator.show')->with('success', 'Code generation process completed!<br>'.implode('<br>', $outputMessages));
    }

    // --- Helper methods adapted from your command ---

    protected function addFieldsToMigrationViaController($tableName, $fieldsData)
    {
        $migrationFile = $this->getLastMigrationFileForTable($tableName);
        if (! $migrationFile) {
            throw new \Exception("Could not find migration file for table: {$tableName}");
        }

        $fieldLines = "            \$table->id();\n"; // Always start with id
        foreach ($fieldsData as $field) {
            if (strtolower($field['name']) === 'id') {
                continue;
            } // Skip if 'id' is manually added

            $line = "            \$table->{$field['type']}('{$field['name']}'";

            if ($field['type'] === 'string' && ! empty($field['length'])) {
                $line .= ", {$field['length']}";
            } elseif (($field['type'] === 'decimal' || $field['type'] === 'float' || $field['type'] === 'double') && ! empty($field['length'])) {
                // For decimals, length can be [total_digits, decimal_places] e.g., "8,2"
                $precisionScale = explode(',', $field['length']);
                $line .= ', '.(int) $precisionScale[0];
                if (isset($precisionScale[1])) {
                    $line .= ', '.(int) $precisionScale[1];
                }
            }
            $line .= ')';

            if (! empty($field['nullable'])) {
                $line .= '->nullable()';
            }
            if (! empty($field['unsigned']) && in_array($field['type'], ['integer', 'bigInteger', 'mediumInteger', 'smallInteger', 'tinyInteger', 'decimal', 'float', 'double'])) {
                $line .= '->unsigned()';
            }
            if (array_key_exists('default', $field) && $field['default'] !== null && $field['default'] !== '') {
                if (is_numeric($field['default']) || in_array(strtolower($field['default']), ['true', 'false'])) {
                    $line .= "->default({$field['default']})";
                } elseif (strtoupper($field['default']) === 'CURRENT_TIMESTAMP') {
                    $line .= "->default(DB::raw('CURRENT_TIMESTAMP'))";
                } else {
                    $line .= "->default('{$field['default']}')";
                }
            }

            if ($field['type'] === 'foreignId' && ! empty($field['foreign_table'])) {
                $line .= "->constrained('{$field['foreign_table']}')";
                if (! empty($field['on_delete'])) {
                    $line .= "->onDelete('{$field['on_delete']}')";
                }
            }

            $line .= ';';
            $fieldLines .= $line."\n";
        }
        $fieldLines .= '            $table->timestamps();'; // Always add timestamps

        $migrationContent = file_get_contents($migrationFile);

        // More robust replacement for the Schema::create block content
        $pattern = '/Schema::create\(\s*\''.$tableName.'\'\s*,\s*function\s*\(Blueprint\s*\$table\)\s*{\s*(\/\/\s*.*)?\s*([\s\S]*?)\s*\}\);/m';
        $replacement = "Schema::create('{$tableName}', function (Blueprint \$table) {\n{$fieldLines}\n        });";

        $newMigrationContent = preg_replace($pattern, $replacement, $migrationContent, 1, $count);

        if ($count === 0) { // Fallback or error if pattern didn't match
            // This might happen if the generated migration is very different.
            // A simpler, but less precise, approach if the above fails:
            $simplePattern = '/public function up\(\)\s*{\s*Schema::create\(\s*\''.$tableName.'\'\s*,\s*function\s*\(Blueprint\s*\$table\)\s*{\s*(.*?)\s*}\);\s*}/s';
            $simpleReplacement = "public function up()\n    {\n        Schema::create('{$tableName}', function (Blueprint \$table) {\n{$fieldLines}\n        });\n    }";
            $newMigrationContent = preg_replace($simplePattern, $simpleReplacement, $migrationContent, 1, $count);
            if ($count === 0) {
                throw new \Exception("Failed to update migration content for {$tableName}. Pattern not found.");
            }
        }

        file_put_contents($migrationFile, $newMigrationContent);
    }

    protected function ensureBasicMigrationStructure($tableName)
    {
        $migrationFile = $this->getLastMigrationFileForTable($tableName);
        if (! $migrationFile) {
            throw new \Exception("Could not find migration file for table: {$tableName}");
        }
        $content = File::get($migrationFile);
        if (! Str::contains($content, '$table->id();')) {
            $fieldLines = "            \$table->id();\n";
            $fieldLines .= '            $table->timestamps();';

            $pattern = '/Schema::create\(\s*\''.$tableName.'\'\s*,\s*function\s*\(Blueprint\s*\$table\)\s*{\s*(\/\/\s*.*)?\s*([\s\S]*?)\s*\}\);/m';
            $replacement = "Schema::create('{$tableName}', function (Blueprint \$table) {\n{$fieldLines}\n        });";
            $newMigrationContent = preg_replace($pattern, $replacement, $content, 1, $count);
            if ($count > 0) {
                File::put($migrationFile, $newMigrationContent);
            }
        }
    }

    protected function getLastMigrationFileForTable($tableName)
    {
        $files = glob(database_path('migrations/*.php'));
        // Sort files by name to get the latest ones first (migrations are timestamped)
        rsort($files);
        foreach ($files as $file) {
            // Check if the file content contains the creation of the specific table
            if (strpos(file_get_contents($file), "Schema::create('{$tableName}'") !== false) {
                return $file;
            }
        }
        // Fallback: if specific table not found (e.g., new migration), return the absolute latest.
        // This might not be 100% accurate if multiple migrations are generated quickly.
        $allFiles = glob(database_path('migrations/*.php'));

        return end($allFiles) ?: null;
    }

    protected function createBladeFilesViaController($modelSnakeName)
    {
        $bladeDirectory = resource_path("views/backend/{$modelSnakeName}");

        if (! File::exists($bladeDirectory)) {
            File::makeDirectory($bladeDirectory, 0755, true);
        }

        // Ensure your template files exist at these locations
        $templateDir = resource_path('views/templates'); // Standardized template location
        if (! File::isDirectory($templateDir)) {
            File::makeDirectory($templateDir, 0755, true);
            // Create dummy templates if they don't exist
            File::put("{$templateDir}/create.blade.php", "<!-- Create Template for {$modelSnakeName} -->\n@extends('layouts.app')\n@section('content')\n<h1>Create New ".Str::studly($modelSnakeName)."</h1>\n{{-- Form using component: <x-backend.backend_component.".Str::kebab($modelSnakeName)."-form /> --}}\n@endsection");
            File::put("{$templateDir}/edit.blade.php", "<!-- Edit Template for {$modelSnakeName} -->\n@extends('layouts.app')\n@section('content')\n<h1>Edit ".Str::studly($modelSnakeName)."</h1>\n{{-- Form using component: <x-backend.backend_component.".Str::kebab($modelSnakeName)."-form :item='\$item' /> --}}\n@endsection");
            File::put("{$templateDir}/show.blade.php", "<!-- Show All Template for {$modelSnakeName} -->\n@extends('layouts.app')\n@section('content')\n<h1>All ".Str::plural(Str::studly($modelSnakeName))."</h1>\n@endsection");
        }

        $filePaths = [
            'add' => "{$templateDir}/create.blade.php",
            'edit' => "{$templateDir}/edit.blade.php",
            'all' => "{$templateDir}/show.blade.php", // Assuming your command used 'all' for the show/index view
        ];

        foreach ($filePaths as $type => $templatePath) {
            if (File::exists($templatePath)) {
                $bladeContent = File::get($templatePath);
                // Replace placeholders if any, e.g., model name
                $bladeContent = str_replace('{{modelNameStudly}}', Str::studly($modelSnakeName), $bladeContent);
                $bladeContent = str_replace('{{modelNameKebab}}', Str::kebab($modelSnakeName), $bladeContent);
                File::put("{$bladeDirectory}/{$type}_{$modelSnakeName}.blade.php", $bladeContent);
            } else {
                Log::warning("Template file not found: {$templatePath}");
            }
        }
    }

    protected function updateComponentWithDummyDataViaController($componentSlug)
    {
        $componentViewPath = resource_path("views/components/backend/backend_component/{$componentSlug}.blade.php");
        $dummyTemplatePath = resource_path('views/templates/component-form.blade.php');

        // Ensure dummy template exists
        if (! File::exists($dummyTemplatePath)) {
            File::makeDirectory(dirname($dummyTemplatePath), 0755, true, true);
            File::put($dummyTemplatePath, "<!-- Dummy Component Form for {$componentSlug} -->\n<form>\n    <!-- Add form fields here -->\n    <button type=\"submit\">Submit</button>\n</form>");
        }

        if (File::exists($componentViewPath) && File::exists($dummyTemplatePath)) {
            $bladeContent = File::get($dummyTemplatePath);
            // Replace placeholders if any
            $bladeContent = str_replace('{{componentSlug}}', $componentSlug, $bladeContent);
            File::put($componentViewPath, $bladeContent);
        } else {
            Log::warning("Failed to update component {$componentSlug}. View path: {$componentViewPath}, Template path: {$dummyTemplatePath}");
        }
    }
}
