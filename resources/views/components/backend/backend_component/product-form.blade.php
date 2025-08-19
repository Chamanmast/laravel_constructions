{{-- resources/views/components/backend/backend_component/product-form.blade.php --}}
<x-form.form :route="$isEdit ? route('product.update', $product->id) : route('product.store')" :isEdit="$isEdit" hasFiles>

    {{--  Category --}}
    <div class="mb-3">
        <x-form.input-label for="category_id" value=" Category" />
        <x-form.select name="category_id" :options="$categories" :selected="$product->category_id ?? null" placeholder="Select Category" />
        <x-form.input-error :messages="$errors->get('category_id')" class="mt-2" />
    </div>

    {{-- Image Upload --}}
    @php
        $small_img = !empty($product->image)
            ? explode('.', $product->image)[0] . '_thumb.' . explode('.', $product->post_image)[1]
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

    {{-- Name --}}
    <div class="mb-3">
        <x-form.input-label for="name" value="Name" />
        <x-form.text-input name="name" :value="$product->name ?? ''" required placeholder="Name" />
        <x-form.input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    {{-- Popular Text Field  --}}
    <div class="row">
        <div class="form-check form-check-primary form-check-inline ms-3">
            <input type="checkbox" name="front" id="form-check-default" value="1" class="form-check-input"
                {{ isset($product) && $product->front == 1 ? 'checked' : '' }}>
            <label for="form-check-default" class="form-check-label">Show on Home Page</label>
        </div>
    </div>


    {{-- Short Description --}}
    <div class="mb-3">
        <x-form.input-label for="stext" value="Short Description" />
        <x-form.textarea name="stext" rows="2" placeholder="Short Description">
            {!! $product->stext ?? '' !!}
        </x-form.textarea>

    </div>

    {{-- Long Description --}}
    <div class="mb-3">
        <x-form.input-label for="long_descp" value="Long Description" />
        <x-form.textarea name="long_descp" id="editor" rows="4" placeholder="Long Description">
            {!! $product->long_descp ?? '' !!}
        </x-form.textarea>

    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
