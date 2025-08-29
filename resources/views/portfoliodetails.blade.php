<x-front-layout>
    @php
    $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
    $banner = App\Models\Pagebanner::select('image', 'name')
            ->where('status', 0)
            ->where('menu_id', 4)
            ->first();
    @endphp
    @section('main')
    @section('title', $template->site_title ."-".$portfolio->name)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @php
    if (!empty($portfolio->image)) {
    $small_img = $portfolio->image;
    } else {
    $small_img = '/upload/no_image.jpg'; # code...
    }
    @endphp
     @section('style')
     <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
     {{pagebanner(asset($banner->image))}}
    @stop
    <div class="blogCntr">
        <div class="bannerimg">
            <h3>Portfolio Details</h3>
           </div>
        <div class="wrapper">
            <div class="blog_details ">
                
                <div class="left_details w-100">
                    <div class="block_details text-center">
                        <figure class="blog_details"> <img src="{{ asset($small_img) }}" alt="{{ $portfolio->name }}" class="img-thumbnail" > </figure>
                        <div class="">
                            <h4>{{ $portfolio->name }}</h4>
                            {!! $portfolio->text !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-front-layout>
