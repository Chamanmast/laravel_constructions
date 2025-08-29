{{-- resources/views/components/backend/backend_component/mega-menu-form.blade.php --}}

{{-- Include the reusable form component --}}
<x-form.form :route="$isEdit ? route('megamenu.update', $megamenu->id) : route('megamenu.store')" :isEdit="$isEdit" method="{{ $isEdit ? 'put' : 'post' }}" files="true">

    {{-- Menu --}}
    <div class="mb-3">
        <x-form.input-label for="menu_id" value="Menu" />
        <x-form.select name="menu_id" :options="$menus" :selected="$megamenu->menu_id ?? null" placeholder="Menu" required />
        <x-form.input-error :messages="$errors->get('menu_id')" class="mt-2" />
    </div>

    {{-- Title --}}
    <div class="mb-3">
        <x-form.input-label for="title" value="Title" />
        <x-form.text-input name="title" :value="$megamenu->title ?? ''" placeholder="Title" required />
        <x-form.input-error :messages="$errors->get('title')" />
    </div>

    {{-- More Menus --}}

    <div class="mb-3">
        <x-form.input-label for="links" value="More Menus" />
        <x-form.select name="links[]" 
        class="form-control taggings" 
        :options="$services" 
        :selected="isset($megamenu) ? explode(',', $megamenu->links) : null" 
        multiple />
         <x-form.input-error :messages="$errors->get('links')" />
    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">
        Submit
    </x-form.button>

</x-form.form>
