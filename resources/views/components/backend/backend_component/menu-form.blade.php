{{-- resources/views/components/backend/backend_component/menu-form.blade.php --}}

{{-- Include the reusable form component --}}
<x-form.form :route="$isEdit ? route('menus.update', $menu->id) : route('menus.store')" :isEdit="$isEdit">

    {{-- Menu Group --}}
    <div class="mb-3">
        <x-form.input-label for="group_id" value="Menu Group" />
        <x-form.select name="group_id" :options="$menugroup" :selected="$menu->group_id ?? ''" placeholder="Menu Group" />
      <x-form.input-error :messages="$errors->get('group_id')" class="mt-2" />
    </div>

    {{-- Parent Menu --}}
    <div class="mb-3">
        <x-form.input-label for="parent_id" value="Parent Menu" />
        <x-form.select name="parent_id" :options="$menus" :selected="$menu->parent_id ?? ''" placeholder="Parent Menu" />
        <x-form.input-error :messages="$errors->get('parent_id')" />
    </div>

    {{-- Title --}}
    <div class="mb-3">
        <x-form.input-label for="title" value="Title" />
        <x-form.text-input name="title" :value="$menu->title ?? ''" placeholder="Title" required />
        <x-form.input-error :messages="$errors->get('title')" />
    </div>

    {{-- URL --}}
    <div class="mb-3">
        <x-form.input-label for="url" value="Url" />
        <x-form.text-input name="url" :value="$menu->url ?? ''" placeholder="Url" />
    </div>

    {{-- Position --}}
    <div class="mb-3">
        <x-form.input-label for="position" value="Position" />
        <x-form.text-input name="position" :value="$menu->position ?? ''" placeholder="Position" />
    </div>

    {{-- Type --}}
    <div class="mb-3">
        <x-form.input-label for="type" value="Type" />
        <x-form.select name="type" :options="$type" :selected="$menu->type ?? ''" placeholder="Type" />
        <x-form.input-error :messages="$errors->get('type')" />
    </div>

 {{-- Meta --}}
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Description" />
                <x-form.textarea  name="meta_description"
                :value="$menu->meta->meta_description ?? ''"
                class="meta_des"
                :rows="5"
                placeholder="Meta Description" />
                            
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Keywords" />
                <x-form.textarea  name="meta_keyword"
                :value="$menu->meta->meta_description ?? ''"
                class="meta_key"                
                :rows="5"
                placeholder="Meta Keywords" />
            </div>
        </div>  
    </div>
    {{-- Submit Button --}}
        
    <x-form.button type="submit">
        Submit
    </x-form.button>
</x-form.form>


