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
     <x-include.breadcrumb :name="$pagename" />


        <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-19 pt-md-16 pb-md-20 text-center">
          <div class="row">
            <div class="col-md-10 col-xl-8 mx-auto">
              <div class="post-header">
                <h1 class="display-1 mb-5">Thank You</h1>
               
                <!-- /.post-meta -->
              </div>
              <!-- /.post-header -->
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
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
