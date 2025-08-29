<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);

        $url = Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();
        $banner = App\Models\Pagebanner::select('image', 'name')->where('status', 0)->where('menu_id', 4)->first();
        if ($menu->meta) {
            $meta_description = $menu->meta->meta_description;
            $meta_keywords = $menu->meta->meta_keywords;
        } else {
            $meta_description = $template->meta_description;
            $meta_keywords = $template->meta_keywords;
        }
        //dd($module2);
    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $menu->title)
    @section('meta_description', $meta_description)
    @section('meta_keywords', $meta_keywords)
    
    <x-pagebanner :title='$menu->title' :image='asset($banner->image)'></x-pagebanner>

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16 text-center">
          <div class="row">
    
            <!-- /column -->
          </div>
          <!-- /.row -->
          <div class="grid grid-view projects-masonry">
            <div class="isotope-filter filter mb-10">
              <ul>
               
                <li><a class="filter-item active" data-filter="*">All</a></li>
                @foreach($categories as $cat)            
                <li><a class="filter-item" data-filter=".{{Str::slug(strtolower($cat->name), '_')}}">{{$cat->name}} </a></li>
                @endforeach
              </ul>
            </div>
            <div class="row gx-md-6 gy-6 isotope">
               
              @foreach($industries as $port)

                        @php

                        if (!empty($port->image)) {
                        $img = explode('.', $port->image);
                        $small_img = $img[0] . '_portfolio_image.' . $img[1];

                        } else {
                        $small_img = url('/').'/upload/no_portfolio.jpg';
                        }
                        @endphp

                        <x-portfolio.single :cat="$port->categorylist($port->categories_ids)" :page="'portfolio'" :id="$port->id" :name="$port->name" :text="$port->small_text" :image="asset($small_img)" />
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
</x-front-layout>
