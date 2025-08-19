{{-- resources/views/components/backend/backend_component/testimonial-form.blade.php --}}

<x-form.form :route="$isEdit ? route('testimonials.update', $testimonial->id) : route('testimonials.store')" method="{{ $isEdit ? 'put' : 'post' }}" files="true" class="forms-sample needs-validation"
    novalidate="novalidate">



    <div class="row mb-3">
        {{-- Name Input --}}
        <div class="col-sm-6">
            <x-form.input-label for="name" value="Name" />
            <x-form.text-input name="name" :value="$testimonial->name ?? null" placeholder="Name" required="required" />
            <x-form.input-error :messages="$errors->get('name')" class="pt-3" />
        </div>

        {{-- Designation Input --}}
        <div class="col-sm-6">
            <x-form.input-label for="designation" value="Designation" />
            <x-form.text-input name="designation" :value="$testimonial->designation ?? null" placeholder="Designation" />
            <x-form.input-error :messages="$errors->get('designation')" class="pt-3" />
        </div>
    </div>


{{-- Image Upload --}}
    @php
        $small_img = !empty($testimonial->image)
            ? explode('.', $testimonial->image)[0] . '_thumb.' . explode('.', $blog->post_image)[1]
            : '/upload/no_image.jpg';
    @endphp

    <div class="row">
        <div class="col-sm-10 mb-3">
            <x-form.input-label for="post_image" value="Image" />
            <x-form.file-input name="post_image" onchange="mainThamUrl(this)" />
            <x-form.input-error :messages="$errors->get('post_image')" class="mt-2" />
            <img src="" class="img-thumbnail img-fluid w-10 my-3" id="mainThmb" />
        </div>
        <div class="col-sm-2 mt-3">
            <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid w-10" />
        </div>
    </div>

    {{-- Textarea for Testimonial Text --}}
    <div class="mb-3">
        <x-form.input-label for="text" value="Text" />
        <x-form.textarea name="text" :value="$testimonial->text ?? null" maxlength="255" rows="3" placeholder="Text" />
    </div>

    {{-- Social Links --}}
    @php
        $socials = !empty($testimonial->social) ? explode(',', $testimonial->social) : [];
    @endphp
    <div id="social">
        <div class="row">
            {{-- Facebook --}}
            <div class="col-sm-6">
                <x-form.input-label for="facebook" value="Facebook" />
                <x-form.text-input name="social[]" :value="$socials[0] ?? null" placeholder="Facebook" />
            </div>

            {{-- Google Plus --}}
            <div class="col-sm-6">
                <x-form.input-label for="gplus" value="Google Plus" />
                <x-form.text-input name="social[]" :value="$socials[1] ?? null" placeholder="Google Plus" />
            </div>
        </div>

        <div class="row">
            {{-- Instagram --}}
            <div class="col-sm-6">
                <x-form.input-label for="instagram" value="Instagram" />
                <x-form.text-input name="social[]" :value="$socials[2] ?? null" placeholder="Instagram" />
            </div>

            {{-- LinkedIn --}}
            <div class="col-sm-6">
                <x-form.input-label for="linkdin" value="LinkedIn" />
                <x-form.text-input name="social[]" :value="$socials[3] ?? null" placeholder="LinkedIn" />
            </div>
        </div>
    </div>

    {{-- Submit Button --}}
    <x-form.button>Submit</x-form.button>

</x-form.form>
