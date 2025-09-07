<x-front-layout>
    @php
       $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
        //dd($module2);
        //$modal8 = App\Models\Module::select('heading', 'image', 'text')->find(8);
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

     <x-include.breadcrumb :name="$menu->title"/>

        <section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
      <div class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative">
        <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; right: -1.9rem;"></div>
        <figure class="rounded"><img src="./assets/img/photos/about7.jpg" srcset="./assets/img/photos/about7@2x.jpg 2x" alt=""></figure>
      </div>
      <!--/column -->
      <div class="col-lg-6">
        <h2 class="display-4 mb-3">Who Are We?</h2>
        <p class="lead fs-lg"> Welcome to Construction Material Trading official name Muassasah Mwad
AlTshyd, Saudi Arabia's leading supplier of high-quality MEP, HVAC, Low
Current, innovative and Automation solutions provider.</p>
        <p class="mb-6">We are a trusted partner delivering end-to-end MEP, HVAC, Low Current, and Automation solutions across Saudi Arabia. Through global partnerships and local expertise, we ensure reliability, compliance, and innovation in every proje</p>
        <div class="row gx-xl-10 gy-6">
          <div class="col-md-12">
            <div class="d-flex flex-row">
              <div>
                <img src="./assets/img/icons/lineal/target.svg" class="svg-inject icon-svg icon-svg-sm me-4" alt="" />
              </div>
              <div>
                <h4 class="mb-1">Our Mission</h4>
                <p class="mb-0">To deliver top-notch technical solutions through
collaboration with world-class international and local
partners, empowering our clients with reliable,
innovative, and cost-effective solutions. We strive to
contribute to the Kingdom's Vision 2030 through
localized procurement and ethical practices.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="col-md-12">
            <div class="d-flex flex-row">
              <div>
                <img src="./assets/img/icons/lineal/award-2.svg" class="svg-inject icon-svg icon-svg-sm me-4" alt="" />
              </div>
              <div>
                <h4 class="mb-1">Our Vision</h4>
                <p class="mb-0"> To be the leading provider of high-quality MEP, HVAC,
Low Current and Automation, fostering innovation and
customer satisfaction while upholding the highest
standards of safety and sustainability.</p>
              </div>
            </div>
          </div>
          <!--/column -->
        </div>
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
