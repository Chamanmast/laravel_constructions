<x-front-layout>
    @php
    $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);

    $url=Route::getCurrentRoute()->uri;
    $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();
    $banner = App\Models\Pagebanner::select('image', 'name')
            ->where('status', 0)
            ->where('menu_id', 4)
            ->first();

        //dd($module2);
    @endphp
    @section('main')
    @section('title', $template->site_title ."-".$menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @section('style')
    {{pagebanner(asset($banner->image))}}
   @stop
   <div style="clear:both;"></div>
    <div class="portfolioCntr blogCntr bottom-margin">
        <div class="bannerimg">
            <h3>Products</h3>
        </div>
        <div class="wrapper">
            <div class="blog_details ">
                <h2><strong>Products </strong></h2>
            </div>
            <section id="our-portfolios" class="portfolio section-padding mt-5-am team-area ptb-80">
                <div class="">
                    <ul class="portfolio mt-5">

                        <li class="filter active" data-filter="all">All</li>
                        @foreach($categories as $cat)
                        <li class="filter" data-filter=".{{Str::slug(strtolower($cat->name), '_')}}">{{$cat->name}} </li>
                        @endforeach
                    </ul>
                </div>
                <div class="portfolio_sec portfolio-inner" id="MixItUp8C6820">
                    <ul class="portfolio-posts">
                        @foreach($products as $product)

                        @php

                        if (!empty($product->image)) {
                        $img = explode('.', $product->image);
                        $small_img = $img[0] . '_portfolio_image.' . $img[1];

                        } else {
                        $small_img = url('/').'/upload/no_portfolio.jpg';
                        }
                        @endphp

                        <x-portfolio-single :cat="$product->categorylist($product->categories_ids)" :page="'product'" :id="$product->id" :name="$product->name" :text="$product->small_text" :image="asset($small_img)" />
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <div style="clear:both;"></div>
    @section('script')
    <script src="{{ asset('https://code.jquery.com/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.mmenu.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.mmenu.setup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.bxslider.js') }}"></script>
    <script src="{{ asset('frontend/assets/jseffect/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/jseffect/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/jseffect/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/jseffect/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/jseffect/wow.js') }}"></script>

    <!-- Parallas Js-->
    <script src="{{ asset('frontend/assets/jseffect/jquery.stellar.min.js') }}"></script>
    <!-- countdown -->
    <script src="{{ asset('frontend/assets/jseffect/jquery.countdown.min.js') }}"></script>
    <!-- Main Custom Js -->
    <script src="{{ asset('frontend/assets/jseffect/custom.js') }}"></script>
    @stop
</x-front-layout>
