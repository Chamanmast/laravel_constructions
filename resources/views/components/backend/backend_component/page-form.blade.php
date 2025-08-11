{{-- resources/views/components/backend/backend_component/page-form.blade.php --}}

<x-form.form :route="$isEdit ? route('pages.update', $page->id) : route('pages.store')" :isEdit="$isEdit" files="true">

    {{-- Menu Selection --}}
    <div class="mb-3">
        <x-form.input-label for="menu_id" value="Menu" />
        <x-form.select name="menu_id" :options="$menus" :selected="$page->menu->id ?? null" required placeholder="Menu" />
        <x-form.input-error :messages="$errors->get('menu_id')" class="pt-3" />
    </div>

    {{-- Name Input --}}
    <div class="mb-3">
        <x-form.input-label for="name" value="Name" />
        <x-form.text-input name="name" :value="$page->name ?? ''" required placeholder="Name" />
        <x-form.input-error :messages="$errors->get('name')" class="pt-3" />
    </div>

    {{-- Heading Input --}}
    <div class="mb-3">
        <x-form.input-label for="heading" value="Heading" />
        <x-form.text-input name="heading" :value="$page->heading ?? ''" placeholder="Heading" />
    </div>

    {{-- Link Input --}}
    <div class="mb-3">
        <x-form.input-label for="link" value="Link" />
        <x-form.text-input name="link" :value="$page->link ?? ''" placeholder="Link" />
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Description" />
                <x-form.textarea  name="meta_description"
                :value="$page->meta->meta_description ?? ''"
                class="meta_des"
                :rows="5"
                placeholder="Meta Description" />
                            
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Keywords" />
                <x-form.textarea  name="meta_keyword"
                :value="$page->meta->meta_description ?? ''"
                class="meta_key"                
                :rows="5"
                placeholder="Meta Keywords" />
            </div>
        </div>  
    </div>
    {{-- Small Text Area --}}
    <div class="mb-3">
        <x-form.input-label for="small_text" value="Small text" />
        <x-form.textarea name="small_text" :value="$page->small_text ?? ''" rows="3" placeholder="Small Text" />
    </div>

    {{-- Image Input --}}
    <div class="row">
        <div class="col-sm-10">
            @php
                $small_img = !empty($page->image) ? explode('.', $page->image)[0] . '_thumb.' . explode('.', $page->image)[1] : '/upload/no_image.jpg';
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
        <x-form.textarea name="text" :value="$page->text ?? ''" id='editor'  placeholder="Text" />
    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">Submit</x-form.button>

</x-form.form>
