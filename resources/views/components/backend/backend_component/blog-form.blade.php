{{-- resources/views/components/backend/backend_component/blog-form.blade.php --}}

<x-form.form :route="$isEdit ? route('blog.update', $blog->id) : route('blog.store')" :isEdit="$isEdit" hasFiles>

    {{-- Blog Category --}}
    <div class="mb-3">
        <x-form.input-label for="blogcat_id" value="Blog Category" />
        <x-form.select name="blogcat_id" :options="$blogCategories" :selected="$blog->blogcat_id ?? null" placeholder="Select Blog Category" />
        <x-form.input-error :messages="$errors->get('blogcat_id')" class="mt-2" />
    </div>

    {{-- Image Upload --}}
    @php
        $small_img = !empty($blog->post_image)
            ? explode('.', $blog->post_image)[0] . '_thumb.' . explode('.', $blog->post_image)[1]
            : '/upload/no_image.jpg';
    @endphp

    <div class="row">
        <div class="col-sm-10">
            <x-form.input-label for="post_image" value="Image" />
            <x-form.file-input name="post_image" onchange="mainThamUrl(this)" />
            <x-form.input-error :messages="$errors->get('post_image')" class="mt-2" />
            <img src="" class="img-thumbnail img-fluid w-10 my-3" id="mainThmb" />
        </div>
        <div class="col-sm-2 mt-3">
            <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid w-10" />
        </div>
    </div>

    {{-- Post Title --}}
    <div class="mb-3">
        <x-form.input-label for="post_title" value="Post Title" />
        <x-form.text-input name="post_title" :value="$blog->post_title ?? ''" required placeholder="Post Title" />
        <x-form.input-error :messages="$errors->get('post_title')" class="mt-2" />
    </div>


    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Description" />
                <x-form.textarea name="meta_description" :value="$blog->meta->meta_description ?? ''" class="meta_des" :rows="5"
                    placeholder="Meta Description" />

            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <x-form.input-label for="type" value="Meta Keywords" />
                <x-form.textarea name="meta_keyword" :value="$blog->meta->meta_description ?? ''" class="meta_key" :rows="5"
                    placeholder="Meta Keywords" />
            </div>
        </div>
    </div>
    {{-- Popular Checkbox --}}
    <div class="form-check form-check-primary form-check-inline">
        <input type="checkbox" name="popular" id="form-check-default" value="1" class="form-check-input"
            {{ $blog->popular == 1 ? 'checked' : '' }}>
        <label for="form-check-default" class="form-check-label">Popular</label>
    </div>

    {{-- Short Description --}}
    <div class="mb-3">
        <x-form.input-label for="short_descp" value="Short Description" />
        <x-form.textarea name="short_descp" rows="2"
            placeholder="Short Description">{!! $blog->short_descp ?? '' !!}</x-form.textarea>
        <x-form.input-error :messages="$errors->get('short_descp')" class="mt-2" />
    </div>

    {{-- Long Description --}}
    <div class="mb-3">
        <x-form.input-label for="long_descp" value="Long Description" />
        <x-form.textarea name="long_descp" id="editor" rows="4"
            placeholder="Long Description">{!! $blog->long_descp ?? '' !!}</x-form.textarea>
        <x-form.input-error :messages="$errors->get('long_descp')" class="mt-2" />
    </div>

    {{-- Post Tags --}}
    <div class="mb-3">

        <x-form.input-label for="post_tags" value="Post Tags" />
        <x-form.select name="post_tags[]" :options="$postTags" :selected="isset($blog) ? explode(',', $blog->post_tags) : []" multiple
            class="taggings" /><x-form.input-error :messages="$errors->get('post_tags')" class="mt-2" />
    </div>

    {{-- Submit --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
