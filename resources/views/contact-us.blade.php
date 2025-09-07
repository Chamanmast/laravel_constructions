<x-front-layout>
    @php
       $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
        $modal1 = App\Models\Module::select('heading', 'small_text', 'image','text')->find(1);
        $modal2 = App\Models\Module::select('heading', 'small_text', 'image')->find(2);
        $url = Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();


        //dd($module2);

    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @section('style')

    @stop
    <x-include.breadcrumb :name="$menu->title"/>

    <div class="container py-14 py-md-16">
        <div class="row gy-10 gx-lg-8 gx-xl-12 mb-16 align-items-center">
            <div class="col-lg-7 position-relative">
                <div class="shape bg-dot primary rellax w-18 h-18" data-rellax-speed="1"
                    style="top: 0; left: -1.4rem; z-index: 0;"></div>
                <div class="row gx-md-5 gy-5">
                    <div class="col-md-6">
                        <figure class="rounded mt-md-10 position-relative"><img src="{{ asset($modal1->image) }}"
                                srcset="{{ asset($modal1->image) }} 2x" alt="{{ $modal1->image }}"></figure>
                    </div>
                    <!--/column -->
                    <div class="col-md-6">
                        <div class="row gx-md-5 gy-5">
                            <div class="col-md-12 order-md-2">
                                <figure class="rounded"><img src="{{ asset($modal2->image) }}"
                                        srcset="{{ asset($modal2->image) }} 2x" alt="{{ $modal2->image }}"></figure>
                            </div>
                            <!--/column -->
                            <div class="col-md-10">
                                <div class="card bg-pale-primary text-center counter-wrapper">
                                    <div class="card-body py-11">
                                        <h3 class="counter text-nowrap">{{$modal1->small_text}}+</h3>
                                        {!!$modal1->text!!}

                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.card -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!--/column -->
            <div class="col-lg-5">
                <h2 class="display-4 mb-8">{{ $modal1->heading }}</h2>
                <div class="d-flex flex-row">
                    <div>
                        <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                    </div>
                    <div>
                        <h5 class="mb-1">Address</h5>
                        <address>{!! $template->company_address !!}</address>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div>
                        <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                    </div>
                    <div>
                        <h5 class="mb-1">Phone</h5>
                        <p><a href="tel:{{ '+91' . $template->email }}">+91-{{ $template->email }}</p>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div>
                        <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-envelope"></i> </div>
                    </div>
                    <div>
                        <h5 class="mb-1">E-mail</h5>

                        <p class="mb-0"> <a href="mailto:{{ $template->email }}"
                                class="link-body">{{ $template->email }}</a></p>
                    </div>
                </div>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <h2 class="display-4 mb-3 text-center">{{ $modal2->heading }}</h2>
                <p class="lead text-center mb-10">{{ $modal2->small_text }}</p>
                <form class="contact-form needs-validation" method="POST" action="{{ route('contact.send') }}"
                    novalidate>
                    @csrf
                    <div class="messages"></div>
                    <div class="row gx-4">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input id="form_name" type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Jane"
                                    value="{{ old('name') }}" required>
                                <label for="form_name">First Name *</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @else
                                        Please enter your first name.
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input id="form_email" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="jane.doe@example.com" value="{{ old('email') }}" required>
                                <label for="form_email">Email *</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @else
                                        Please provide a valid email address.
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <textarea id="form_message" name="message" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Your message" style="height: 150px" required>{{ old('message') }}</textarea>
                                <label for="form_message">Message *</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">
                                    @error('message')
                                        {{ $message }}
                                    @else
                                        Please enter your message.
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input id="form_captcha" type="text" name="captcha"
                                    class="form-control @error('captcha') is-invalid @enderror"
                                    placeholder="Enter captcha" required>
                                <label for="form_captcha">Captcha Code ({{ $captcha }}) *</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">
                                    @error('captcha')
                                        {{ $message }}
                                    @else
                                        Please enter the captcha code.
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                value="Send message">
                            <p class="text-muted"><strong>*</strong> These fields are required.</p>
                        </div>
                    </div>
                </form>

                <!-- /form -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>

</x-front-layout>
