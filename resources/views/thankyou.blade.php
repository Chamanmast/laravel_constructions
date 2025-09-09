<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);

        $pagename = 'Thank You';
    @endphp
    @section('main')
    @section('title', $pagename)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @section('style')

    @stop
    <div class="blogCntr">
        <x-include.breadcrumb :name="$pagename" />


        <div class="wrapper">
            <div class="blog_details">
                <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>

                <hr>
                <div class="main-content">


                    <p>Your inquiry has been received.</p>

                    <h3>We appreciate your interest and will get back to you shortly.</h3>

                </div>
                <div class="main-content">
                    <a href="{{ route('home') }}" class="enquirybtn">Return to Homepage</a>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <!-- JS here -->
        <script src="{{ asset('frontend/assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.mmenu.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.mmenu.setup.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.bxslider.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
    @stop
</x-front-layout>
