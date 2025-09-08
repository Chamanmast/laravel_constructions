<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);
        //dd($module2);
        $modal6 = App\Models\Module::select('heading', 'image', 'text')->find(6);
        // $modal9 = App\Models\Module::select('heading', 'image', 'text')->find(9);
        // $modal11 = App\Models\Module::select('heading', 'image', 'text', 'small_text')->find(11);
        // $modal12 = App\Models\Module::select('small_text', 'image')->find(12);
        $url = Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();

        //dd($banner  );

    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <x-include.breadcrumb :name="$menu->title" />

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                <div class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative">
                    <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1"
                        style="top: -2rem; right: -1.9rem;"></div>
                    <figure class="rounded"><img src="{{ asset($modal6->image) }}"
                            srcset="{{ asset($modal6->image) }} 2x" alt=""></figure>
                </div>
                <!--/column -->
                <div class="col-lg-6">
                    <h2 class="display-4 mb-3">{{ $modal6->heading }}</h2>
                   {!! $modal6->text !!}

                    <!--/.row -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    {{-- <x-about.who> </x-about.who>
    <!-- /section -->
    <x-about.testimonials> </x-about.testimonials>
    <x-about.team></x-about.team>
    <x-home.home-counter></x-home.home-counter>

    <x-about.contact :email='$template->email' :address='$template->company_address' :heading='$modal12->small_text' :image='$modal12->image'
        :phone='$template->support_phone'></x-about.contact> --}}

</x-front-layout>
