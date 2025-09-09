{{-- resources/views/components/backend/backend_component/service-form.blade.php --}}

<x-form.form :route="$isEdit ? route('services.update', $service->id) : route('services.store')" method="{{ $isEdit ? 'put' : 'post' }}" class="forms-sample needs-validation"
    novalidate="novalidate" files="true">

    <div class="row">
         <div class="col-4">
            {{-- Name --}}
            <div class="mb-3">
                <x-form.input-label for="brand" value="Brands" />
                <x-form.select name="brand[]" :options="$brands" :selected="isset($service) ? explode(',', $service->brands) : []" multiple
                    class="taggings" /><x-form.input-error :messages="$errors->get('brand')" class="mt-2" />
            </div>
        </div>
        <div class="col-4">
               {{-- Category Select --}}
            <x-form.input-label for="category_id" value="Category" />
            <x-form.select name="category_id" :options="$categories" :selected="$service->category_id ?? null" />
            <x-form.input-error :messages="$errors->get('category_id')" class="pt-3" />
        </div>
        <div class="col-4">
            {{-- Name Input --}}
            <x-form.input-label for="name" value="Name" />
            <x-form.text-input name="name" :value="$service->name ?? null" placeholder="Name" />
            <x-form.input-error :messages="$errors->get('name')" class="pt-3" />
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Description" />
                <x-form.textarea name="meta_description" :value="$menu->meta->meta_description ?? ''" class="meta_des" :rows="5"
                    placeholder="Meta Description" />

            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Keywords" />
                <x-form.textarea name="meta_keyword" :value="$menu->meta->meta_description ?? ''" class="meta_key" :rows="5"
                    placeholder="Meta Keywords" />
            </div>
        </div>
    </div>


    {{-- Small Text Input --}}
    <div class="col-sm-12 mb-3">
        <x-form.input-label for="small_text" value="Small Text" />
        <x-form.textarea name="small_text" :value="$service->small_text ?? null"  placeholder="Text" />
    </div>

    {{-- Image Upload --}}
    <div class="row mb-3">
        <div class="col-sm-10">
            <x-form.input-label for="image" value="Icon Image" />
            <x-form.file-input name="image" :value="$service->image ?? null" placeholder="Main Thumbnail" />
            <x-form.input-error :messages="$errors->get('image')" class="pt-3" />
            <img src="" class="img-thumbnail img-fluid img-responsive w-10 my-3" id="mainThmb">
        </div>
        <div class="mt-3 col-sm-2">
            <img src="{{ asset($service->image ?? '/upload/no_image.jpg') }}"
                class="img-thumbnail img-fluid img-responsive w-10">
        </div>
    </div>

    {{-- Textarea Input --}}
    <div class="mb-3">
        <x-form.input-label for="text" value="Text" />
        <x-form.textarea name="text" :value="$service->text ?? null" placeholder="Text" id="editor" />
    </div>

    {{-- Submit Button --}}
    <x-form.button>{{ $isEdit ? 'Update' : 'Submit' }}</x-form.button>

</x-form.form>
