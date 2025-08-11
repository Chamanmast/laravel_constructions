{{-- resources/views/components/backend/backend_component/module-form.blade.php --}}

<x-form.form :route="$isEdit ? route('modules.update', $module->id) : route('modules.store')" :isEdit="$isEdit" files="true">

    {{-- Name Input --}}
    <div class="mb-3">
        <x-form.input-label for="name" value="Name" />
        <x-form.text-input name="name" :value="$module->name ?? ''" required placeholder="Name" />
        <x-form.input-error :messages="$errors->get('name')" class="pt-3" />
    </div>

    {{-- Heading Input --}}
    <div class="mb-3">
        <x-form.input-label for="heading" value="Heading" />
        <x-form.text-input name="heading" :value="$module->heading ?? ''" required placeholder="Heading" />
    </div>

    {{-- Link Input --}}
    <div class="mb-3">
        <x-form.input-label for="link" value="Link" />
        <x-form.text-input name="link" :value="$module->link ?? ''" placeholder="Link" />
    </div>

    {{-- Small Text Area --}}
    <div class="mb-3">
        <x-form.input-label for="small_text" value="Small text" />
        <x-form.textarea name="small_text" :value="$module->small_text ?? ''" maxlength="255" rows="3" placeholder="Small Text" />
    </div>

    {{-- Image Input --}}
    <div class="row">
        <div class="col-sm-10">
            @php
                $small_img = !empty($module->image) ? explode('.', $module->image)[0] . '_thumb.' . explode('.', $module->image)[1] : '/upload/no_image.jpg';
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
        <x-form.textarea name="text" :value="$module->text ?? ''" id="editor" placeholder="Text" />
    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">Submit</x-form.button>

</x-form.form>
