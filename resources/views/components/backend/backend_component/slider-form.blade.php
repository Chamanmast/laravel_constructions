{{-- resources/views/components/backend/backend_component/slider-form.blade.php --}}

<x-form.form :route="$isEdit ? route('slider.update', $slider->id) : route('slider.store')" :isEdit="$isEdit" hasFiles>

    {{-- Image Upload --}}
    @php
        $small_img = !empty($slider->image)
            ? explode('.', $slider->image)[0] . '_thumb.' . explode('.', $slider->image)[1]
            : '/upload/no_image.jpg';
    @endphp

    <div class="row">
        <div class="col-sm-10">
            <x-form.input-label for="image" value="Image" />
            <x-form.file-input name="image" onchange="mainThamUrl(this)" />
            <x-form.input-error :messages="$errors->get('image')" class="mt-2" />
            <img src="" class="img-thumbnail img-fluid w-10 my-3" id="mainThmb" />
        </div>
        <div class="col-sm-2 mt-3">
            <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid w-10" />
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            {{-- Name --}}
            <div class="mb-3">
                <x-form.input-label for="name" value="Name" />
                <x-form.text-input name="name" :value="$slider->name ?? ''" required placeholder="Heading" />
                <x-form.input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>
        <div class="col-6">
            {{-- Title --}}
            <div class="mb-3">
                <x-form.input-label for="title" value="Heading" />
                <x-form.text-input name="title" :value="$slider->name ?? ''" required placeholder="Heading" />
                <x-form.input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
        </div>
    </div>



    {{-- Sub title --}}
    <div class="mb-3">
        <x-form.input-label for="sub_title" value="Sub Heading" />
        <x-form.text-input name="sub_title" :value="$slider->sub_title ?? ''" required placeholder="Sub Heading" />
        <x-form.input-error :messages="$errors->get('sub_title')" class="mt-2" />
    </div>



    {{-- Long Description --}}
    <div class="mb-3">
        <x-form.input-label for="text" value="Long Description" />
        <x-form.textarea name="text" id="editor" rows="4" placeholder="Long Description">
            {!! $slider->text ?? '' !!}
        </x-form.textarea>
        <x-form.input-error :messages="$errors->get('text')" class="mt-2" />
    </div>

    {{-- Submit Button --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
