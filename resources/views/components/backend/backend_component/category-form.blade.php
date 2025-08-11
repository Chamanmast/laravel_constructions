{{-- resources/views/components/backend/backend_component/category-form.blade.php --}}

<x-form.form :route="$isEdit ? route('category.update', $category->id) : route('category.store')" :isEdit="$isEdit">

<div class="mb-3">
        <x-form.input-label for="name" value="Name" />
        <x-form.text-input name="name" :value="$category->name ?? ''" required placeholder="Name" />
        <x-form.input-error :messages="$errors->get('name')" class="mt-2" />
</div>

 {{-- Image Input --}}
    <div class="row">
        <div class="col-sm-10">
            @php
                $small_img = !empty($category->image) ? explode('.', $category->image)[0] . '_thumb.' . explode('.', $category->image)[1] : '/upload/no_image.jpg';
            @endphp
            <x-form.input-label for="image" value="Image" />
            <x-form.file-input name="image" onchange="mainThamUrl(this)" placeholder="Main Thumbnail" />
            <x-form.input-error :messages="$errors->get('image')" class="pt-3" />
            <img src="" class="img-thumbnail img-fluid img-responsive w-10 my-3" id="mainThmb">
        </div>
        <div class="mt-3 col-sm-2">
            <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid img-responsive w-10">
        </div>
    </div>

    {{-- Text Area (Editor) --}}
    <div class="mb-3">
        <x-form.input-label for="text" value="Text" />
        <x-form.textarea name="text" :value="$category->text ?? ''" id="editor" placeholder="Text" />
    </div>


 {{-- Submit --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

    </x-form.form>
