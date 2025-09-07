<x-front-layout>
    @php
    $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);

    $url=Route::getCurrentRoute()->uri;
    $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();

    @endphp
    @section('main')
    @section('title', $template->site_title ."-".$menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <x-include.breadcrumb :name="$menu->title"/>

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16 text-center">
          <div class="row">

            <!-- /column -->
          </div>
          <!-- /.row -->
          <div class="grid grid-view projects-masonry">

            <div class="row gx-md-6 gy-6 isotope">

              @foreach($projects as $port)

                        @php

                        if (!empty($port->image)) {
                        $img = explode('.', $port->image);
                        $small_img = $img[0] . '_portfolio_image.' . $img[1];

                        } else {
                        $small_img = url('/').'/upload/no_portfolio.jpg';
                        }
                        @endphp

                        {{-- <x-portfolio.single :cat="$$port->service_id" :page="'project'" :id="$port->id" :name="$port->name" :text="$port->small_text" :image="asset($small_img)" />
                        --}}
                            @endforeach
              <!-- /.project -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.grid -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->

      <!-- /section -->
</x-front-layout>
