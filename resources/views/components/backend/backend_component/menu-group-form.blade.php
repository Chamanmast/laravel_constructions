{{-- resources/views/components/backend/backend_component/menugroup-form.blade.php --}}

<x-form.form :route="$isEdit ? route('menugroup.update', $menugroup->id) : route('menugroup.store')" :isEdit="$isEdit">

    {{-- Title --}}
    <div class="mb-3">
        <x-form.input-label for="title" value="Title" />
        <x-form.text-input name="title" :value="$menugroup->title ?? ''" placeholder="Title" required />
        <x-form.input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">
        Submit
    </x-form.button>

</x-form.form>
