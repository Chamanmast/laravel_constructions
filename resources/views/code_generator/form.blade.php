<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Code Generator</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f7f6; color: #333; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1, h2 { color: #2c3e50; }
        .model-block { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: #f9f9f9; }
        .field-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 10px; align-items: flex-end; margin-bottom: 10px; padding-bottom:10px; border-bottom: 1px dashed #eee; }
        .field-row:last-child { border-bottom: none; }
        label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 0.9em; }
        input[type="text"], input[type="number"], select, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 5px; /* Adjusted */
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="checkbox"] { margin-right: 5px; vertical-align: middle; }
        button { background-color: #3498db; color: white; border: none; cursor: pointer; transition: background-color 0.3s; }
        button:hover { background-color: #2980b9; }
        .remove-btn { background-color: #e74c3c; font-size:0.8em; padding: 6px 10px; }
        .remove-btn:hover { background-color: #c0392b; }
        .add-btn { background-color: #2ecc71; margin-top:5px; }
        .add-btn:hover { background-color: #27ae60; }
        .submit-btn { background-color: #16a085; padding: 10px 15px; font-size: 1.1em; }
        .submit-btn:hover { background-color: #117a65; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; }
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
        .alert-danger ul { margin-top: 0; margin-bottom: 0; padding-left: 20px; }
        .options-group { display: flex; flex-wrap: wrap; gap: 10px; align-items: center; }
        .options-group label { margin-bottom: 0; } /* Prevent double margin */
        .options-group input[type="text"], .options-group input[type="number"] { width: auto; flex-grow: 1; min-width: 60px; }
    </style>
</head>
<body x-data="codeGenerator()">
    <div class="container">
        <h1>Laravel Code Generator</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
                @if(session('success_details'))
                    <hr>
                    <strong>Details:</strong><br>
                    {!! session('success_details') !!}
                @endif
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{!! session('error') !!}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('code-generator.generate') }}" method="POST">
            @csrf

            <template x-for="(model, modelIndex) in models" :key="model.id">
                <div class="model-block">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <h2 x-text="'Model ' + (model.name || '[New Model]')"></h2>
                        <button type="button" class="remove-btn" @click="removeModel(modelIndex)">Remove Model</button>
                    </div>
                    <div>
                        <label :for="'model_name_' + model.id">Model Name (e.g., CareerLayout, Product):</label>
                        <input type="text" :id="'model_name_' + model.id" x-model="model.name" :name="'models[' + modelIndex + '][name]'" placeholder="ModelName" required>
                    </div>

                    <h3>Fields:</h3>
                    <template x-for="(field, fieldIndex) in model.fields" :key="field.id">
                        <div class="field-row">
                            <div>
                                <label :for="'field_name_' + model.id + '_' + field.id">Name:</label>
                                <input type="text" :id="'field_name_' + model.id + '_' + field.id" x-model="field.name" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][name]'" placeholder="field_name" required>
                            </div>
                            <div>
                                <label :for="'field_type_' + model.id + '_' + field.id">Type:</label>
                                <select :id="'field_type_' + model.id + '_' + field.id" x-model="field.type" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][type]'" required>
                                    @foreach($dataTypes as $type)
                                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label :for="'field_length_' + model.id + '_' + field.id">Length/Precision:</label>
                                <input type="text" :id="'field_length_' + model.id + '_' + field.id" x-model="field.length" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][length]'" placeholder="e.g., 255 or 8,2">
                            </div>
                            <div>
                                <label :for="'field_default_' + model.id + '_' + field.id">Default:</label>
                                <input type="text" :id="'field_default_' + model.id + '_' + field.id" x-model="field.default" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][default]'" placeholder="e.g., 0 or text">
                            </div>
                            <div class="options-group">
                                <label :for="'field_nullable_' + model.id + '_' + field.id">
                                    <input type="checkbox" :id="'field_nullable_' + model.id + '_' + field.id" x-model="field.nullable" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][nullable]'" value="1"> Nullable
                                </label>
                                <label :for="'field_unsigned_' + model.id + '_' + field.id" x-show="['integer', 'bigInteger', 'mediumInteger', 'smallInteger', 'tinyInteger', 'decimal', 'float', 'double'].includes(field.type)">
                                    <input type="checkbox" :id="'field_unsigned_' + model.id + '_' + field.id" x-model="field.unsigned" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][unsigned]'" value="1"> Unsigned
                                </label>
                            </div>
                             <template x-if="field.type === 'foreignId'">
                                <div style="grid-column: span 2;">
                                    <label :for="'field_foreign_table_' + model.id + '_' + field.id">Foreign Table (plural, snake_case):</label>
                                    <input type="text" :id="'field_foreign_table_' + model.id + '_' + field.id" x-model="field.foreign_table" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][foreign_table]'" placeholder="e.g., users">
                                    <label :for="'field_on_delete_' + model.id + '_' + field.id">On Delete:</label>
                                    <select :id="'field_on_delete_' + model.id + '_' + field.id" x-model="field.on_delete" :name="'models[' + modelIndex + '][fields][' + fieldIndex + '][on_delete]'">
                                        <option value="">None</option>
                                        <option value="cascade">Cascade</option>
                                        <option value="set null">Set Null</option>
                                        <option value="restrict">Restrict</option>
                                    </select>
                                </div>
                            </template>
                            <div>
                                <button type="button" class="remove-btn" @click="removeField(modelIndex, fieldIndex)">Remove Field</button>
                            </div>
                        </div>
                    </template>
                    <button type="button" class="add-btn" @click="addField(modelIndex)">+ Add Field</button>
                </div>
            </template>

            <button type="button" class="add-btn" @click="addModel()">+ Add Model</button>
            <hr style="margin: 20px 0;">
            <button type="submit" class="submit-btn">Generate Code</button>
        </form>
    </div>

    <script>
        function codeGenerator() {
            return {
                models: [{ id: Date.now(), name: '', fields: [] }],
                addModel() {
                    this.models.push({ id: Date.now(), name: '', fields: [] });
                },
                removeModel(modelIndex) {
                    this.models.splice(modelIndex, 1);
                },
                addField(modelIndex) {
                    this.models[modelIndex].fields.push({
                        id: Date.now(),
                        name: '',
                        type: 'string',
                        length: '',
                        default: '',
                        nullable: false,
                        unsigned: false,
                        foreign_table: '',
                        on_delete: ''
                    });
                },
                removeField(modelIndex, fieldIndex) {
                    this.models[modelIndex].fields.splice(fieldIndex, 1);
                },
                // Pre-fill with example data if needed for testing from old input
                init() {
                    const oldModels = @json(old('models'));
                    if (oldModels && oldModels.length > 0) {
                        this.models = oldModels.map(model => ({
                            ...model,
                            id: Date.now() + Math.random(), // Ensure unique ID for Alpine key
                            fields: model.fields ? model.fields.map(field => ({
                                ...field,
                                id: Date.now() + Math.random(), // Ensure unique ID
                                nullable: !!field.nullable, // Ensure boolean
                                unsigned: !!field.unsigned  // Ensure boolean
                            })) : []
                        }));
                    } else if (this.models.length === 0 || (this.models.length === 1 && !this.models[0].name && this.models[0].fields.length === 0)) {
                         // Default if no old input and models array is empty or just a placeholder
                        this.models = [{ id: Date.now(), name: 'ExampleModel', fields: [
                            { id: Date.now()+1, name: 'title', type: 'string', length: '100', default: '', nullable: false, unsigned: false, foreign_table: '', on_delete: '' },
                            { id: Date.now()+2, name: 'is_active', type: 'boolean', length: '', default: '1', nullable: false, unsigned: false, foreign_table: '', on_delete: '' }
                        ]}];
                    }
                }
            }
        }
    </script>
</body>
</html>