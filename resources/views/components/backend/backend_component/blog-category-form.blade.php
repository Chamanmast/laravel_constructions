{{-- resources/views/components/backend/backend_component/blog-category-form.blade.php --}}

<x-form.form :route="$isEdit ? route('blogcategory.update', $blogcategory->id) : route('blogcategory.store')" :isEdit="$isEdit">

    <div class="col-sm-12">
        <div class="mb-3">
            <x-form.input-label for="category_name" value="Name" />
            <x-form.text-input name="category_name" :value="$blogcategory->category_name ?? ''" required placeholder="Name" />
            <x-form.input-error :messages="$errors->get('category_name')" class="mt-2" />
        </div>
    </div>

    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
