<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);

        $url = Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();


    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <x-include.breadcrumb :name="$menu->title" />


    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pt-9 pt-md-11 pb-14 pb-md-16">
            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 gx-lg-6 gy-6 justify-content-center">
                @foreach ($logos as $logo)
                    <div class="col">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6 p-md-8">
                                <figure class="px-md-3 px-xl-0 px-xxl-3 mb-0">
                                    @if ($logo->image)
                                        <img src="{{ asset($logo->image) }}" alt="" />
                                    @endif
                                    <p class="text-center pt-3 fw-bold">{{ $logo->name }}</p>
                                </figure>

                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                @endforeach

                <!--/column -->

            </div>

            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->


    <!-- /section -->
</x-front-layout>
