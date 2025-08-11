{{-- resources/views/components/backend/backend_component/blog-tag-form.blade.php --}}

<x-form.form :route="$isEdit ? route('tag.update', $tag->id) : route('tag.store')" :isEdit="$isEdit">

    {{-- Tag Name --}}
    <div class="mb-3">
        <x-form.input-label for="tag_name" value="Name" />
        <x-form.text-input name="tag_name" :value="$tag->tag_name ?? ''" required placeholder="Name" />
        <x-form.input-error :messages="$errors->get('tag_name')" class="mt-2" />
    </div>

    {{-- Submit --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
