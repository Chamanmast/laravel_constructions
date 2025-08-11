{{-- resources/views/components/backend/backend_component/site-settings-form.blade.php --}}

<x-form.form :route="route('update.site.setting', $sitesetting->id)" method="patch" class="forms-sample needs-validation" novalidate="novalidate" files="true">

    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="row">
                @php
                    $small_img = $sitesetting->logo ?? '';
                    $wsize = $small_img ? 10 : 12;
                @endphp
                <div class="col-sm-{{ $wsize }}">
                    <x-form.input-label for="logo" value="Logo" />
                    <x-form.file-input name="logo" :value="$small_img" placeholder="Main Thumbnail" onchange="mainThamUrl(this)" />
                    <x-form.input-error :messages="$errors->get('logo')" class="pt-3" />
                    <div class="mt-3">
                        <img src="" id="mainThmb" class="img-responsive border border-1">
                    </div>
                </div>
                @if ($small_img)
                    <div class="mt-3 col-sm-2">
                        <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid img-responsive w-10">
                    </div>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
                @php
                    $small_img = $sitesetting->favicon ?? '';
                    $wsize = $small_img ? 10 : 12;
                @endphp
                <div class="col-sm-{{ $wsize }}">
                    <x-form.input-label for="favicon" value="Favicon" />
                    <x-form.file-input name="favicon" :value="$small_img" placeholder="Main Thumbnail" onchange="mainThamUrl(this)" />
                    <x-form.input-error :messages="$errors->get('favicon')" class="pt-3" />
                    <div class="mt-3">
                        <img src="" id="mainThmb" class="img-responsive border border-1">
                    </div>
                </div>
                @if ($small_img)
                    <div class="mt-3 col-sm-2">
                        <img src="{{ asset($small_img) }}" class="img-thumbnail img-fluid img-responsive w-10">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6">
            <x-form.input-label for="app_name" value="App Name" />
            <x-form.text-input name="app_name" :value="$sitesetting->app_name" placeholder="App Name" required="true" />
            <x-form.input-error :messages="$errors->get('app_name')" class="pt-3" />
        </div>

        <div class="col-sm-6">
            <x-form.input-label for="site_title" value="Site Title" />
            <x-form.text-input name="site_title" :value="$sitesetting->site_title" placeholder="Site Title" required="true" />
            <x-form.input-error :messages="$errors->get('site_title')" class="pt-3" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6">
            <x-form.input-label for="meta_description" value="Meta Description" />
            <x-form.textarea name="meta_description" :value="$sitesetting->meta_description" maxlength="300" rows="5" placeholder="Meta Description" />
            <x-form.input-error :messages="$errors->get('meta_description')" class="pt-3" />
        </div>

        <div class="col-sm-6">
            <x-form.input-label for="meta_keywords" value="Meta Keywords" />
            <x-form.textarea name="meta_keywords" :value="$sitesetting->meta_keywords" maxlength="255" rows="5" placeholder="Meta Keywords" />
            <x-form.input-error :messages="$errors->get('meta_keywords')" class="pt-3" />
        </div>
    </div>

    <div class="col-sm-12 mb-3">
        <x-form.input-label for="pagination" value="Pagination" />
        <x-form.text-input  name="pagination" :value="$sitesetting->pagination" max="50" placeholder="Pagination" />

    </div>

    <h2 class="mt-3">Footer Section</h2>
    <hr>

    <div class="row mb-3">
        <div class="col-sm-4">
            <x-form.input-label for="address" value="Company Address" />
            <x-form.textarea name="address" :value="$sitesetting->address" maxlength="100" rows="3" placeholder="About" />
        </div>

        <div class="col-sm-4">
            <x-form.input-label for="email" value="Email" />
            <x-form.text-input name="email" :value="$sitesetting->email" placeholder="Email" />
        </div>

        <div class="col-sm-4">
            <x-form.input-label for="phone" value="Phone" />
            <x-form.text-input name="phone" :value="$sitesetting->phone" placeholder="Phone" />
        </div>
    </div>



    <div class="col-sm-12 mb-3">
        <x-form.input-label for="copywrite" value="Copywrite" />
        <x-form.text-input name="copywrite" :value="$sitesetting->copywrite" maxlength="100" placeholder="Copywrite" />
        <x-form.input-error :messages="$errors->get('copywrite')" class="pt-3" />
    </div>

    <div class="row mb-3">
        <div class="col-sm-6">
            <x-form.input-label for="facebook" value="Facebook" />
            <x-form.text-input name="facebook" :value="$sitesetting->facebook" placeholder="Facebook" />
        </div>

        <div class="col-sm-6">
            <x-form.input-label for="twitter" value="Twitter" />
            <x-form.text-input name="twitter" :value="$sitesetting->twitter" placeholder="Twitter" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-4">
            <x-form.input-label for="pinterest" value="Pinterest" />
            <x-form.text-input name="pinterest" :value="$sitesetting->pinterest" placeholder="Pinterest" />
        </div>

        <div class="col-sm-4">
            <x-form.input-label for="instagram" value="Instagram" />
            <x-form.text-input name="instagram" :value="$sitesetting->instagram" placeholder="Instagram" />
        </div>
          <div class="col-sm-4">
            <x-form.input-label for="youtube" value="Youtube" />
            <x-form.text-input name="youtube" :value="$sitesetting->youtube" placeholder="Youtube" />
        </div>
    </div>

    <div class="col-sm-12 mb-3">
        <x-form.input-label for="about" value="About" />
        <x-form.textarea name="about" :value="$sitesetting->about" maxlength="300" rows="3" placeholder="About" />
        <x-form.input-error :messages="$errors->get('about')" class="pt-3" />
    </div>

    <x-form.button>Submit</x-form.button>

</x-form.form>
