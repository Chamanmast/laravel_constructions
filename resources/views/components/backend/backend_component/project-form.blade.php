{{-- resources/views/components/backend/backend_component/project-form.blade.php --}}
<x-form.form :route="$isEdit ? route('project.update', $project->id) : route('project.store')" :isEdit="$isEdit" hasFiles>

    <div class="row mb-3">
        <div class="col-4">

            {{-- Name --}}
            <div class="mb-3">
                <x-form.input-label for="brand" value="Brands" />
                <x-form.select name="brand[]" :options="$brands" :selected="isset($project) ? explode(',', $project->brand) : []" multiple
                    class="taggings" /><x-form.input-error :messages="$errors->get('brand')" class="mt-2" />
            </div>
        </div>
        <div class="col-4">
            {{--  Category --}}
            <div class="mb-3">
                <x-form.input-label for="service_id" value=" Category" />
                <x-form.select name="service_id" :options="$categories" :selected="$project->service_id ?? null" placeholder="Select Category" />
                <x-form.input-error :messages="$errors->get('service_id')" class="mt-2" />
            </div>

        </div>
        <div class="col-4">
            {{-- Name --}}
            <div class="mb-3">
                <x-form.input-label for="name" value="Name" />
                <x-form.text-input name="name" :value="$project->name ?? ''" required placeholder="Name" />
                <x-form.input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>
    </div>


    {{-- Image Upload --}}
    @php
        $small_img = !empty($project->image)
            ? explode('.', $project->image)[0] . '_thumb.' . explode('.', $project->image)[1]
            : '/upload/no_image.jpg';
    @endphp

    <div class="row mb-3">
        <div class="col-sm-10">
            <x-form.input-label for="image" value="Image" />
            <x-form.file-input name="image" onchange="mainThamUrl(this)" />
            <x-form.input-error :messages="$errors->get('image')" class="mt-2" />
            <img src="" class="img-thumbnail img-fluid w-10 my-3" id="mainThmb" />
        </div>
        <div class="col-sm-2 mt-3">
            <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid w-10" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-3">
            <x-form.input-label for="client" value="Client" />
            <x-form.text-input name="client" :value="$project->client ?? ''" placeholder="Client" />
            <x-form.input-error :messages="$errors->get('client')" class="mt-2" />
        </div>
        <div class="col-3">
            <x-form.input-label for="specialist_supplier" value="Specialist Supplier" />
            <x-form.text-input name="specialist_supplier" :value="$project->specialist_supplier ?? ''" placeholder="Specialist Supplier" />
            <x-form.input-error :messages="$errors->get('specialist_supplier')" class="mt-2" />

        </div>
        <div class="col-3">

            <x-form.input-label for="contractor" value="Contractor" />
            <x-form.text-input name="contractor" :value="$project->contractor ?? ''" placeholder="Contractor" />
            <x-form.input-error :messages="$errors->get('contractor')" class="mt-2" />
        </div>
        <div class="col-3">
            <x-form.input-label for="location" value="Location" />
            <x-form.text-input name="location" :value="$project->location ?? ''" placeholder="Location" />
            <x-form.input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

    </div>

    {{-- Popular Text Field  --}}
    <div class="row mb-3">
        <div class="form-check form-check-primary form-check-inline ms-3">
            <input type="checkbox" name="front" id="form-check-default" value="1" class="form-check-input"
                {{ isset($project) && $project->front == 1 ? 'checked' : '' }}>
            <label for="form-check-default" class="form-check-label">Show on Home Page</label>
        </div>
    </div>


    {{-- Short Description --}}
    <div class="mb-3">
        <x-form.input-label for="stext" value="Short Description" />
        <x-form.textarea name="stext" rows="2" placeholder="Short Description">
            {!! $project->stext ?? '' !!}
        </x-form.textarea>

    </div>

    {{-- Long Description --}}
    <div class="mb-3">
        <x-form.input-label for="text" value="Long Description" />
        <x-form.textarea name="text" id="editor" rows="4" placeholder="Long Description">
            {!! $project->text ?? '' !!}
        </x-form.textarea>

    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
