<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);
        $banner = App\Models\Pagebanner::select('image', 'name')->where('status', 0)->where('menu_id', 4)->first();

        if ($industry->meta) {
            $meta_description = $industry->meta->meta_description;
            $meta_keywords = $industry->meta->meta_keywords;
        } else {
            $meta_description = $template->meta_description;
            $meta_keywords = $template->meta_keywords;
        }
    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $industry->name)
    @section('meta_description', $meta_description)
    @section('meta_keywords', $meta_keywords)
    @php
        if (!empty($industry->image)) {
            $small_img = $industry->image;
        } else {
            $small_img = '/upload/no_image.jpg'; # code...
        }
    @endphp
    @section('style')
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        {{ pagebanner(asset($banner->image)) }}
    @stop
    <div class="blogCntr">
        <div class="bannerimg">
            <h3>industry Details</h3>
        </div>
        <div class="wrapper">
            <div class="blog_details ">

                <div class="left_details w-100">
                    <div class="block_details text-center">
                        <figure class="blog_details"> <img src="{{ asset($small_img) }}" alt="{{ $industry->post_title }}"
                                class="img-thumbnail"> </figure>
                        <div class="">
                            <h4>{{ $industry->name }}</h4>
                            {!! $industry->text !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @section('script')
    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.mmenu.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.mmenu.setup.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
@stop
</x-front-layout>
