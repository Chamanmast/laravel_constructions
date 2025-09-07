@props(['template'])
@php
    $modal = App\Models\SiteSetting::select(
        'address',
        'site_title',
        'email',
        'about',
        'logo',
        'phone',
        'facebook',
        'twitter',
        'pinterest',
        'about',
        'copywrite',
    )->find(1);
	$phone = str_replace('-', '', $modal->support_phone);


@endphp

 <!-- /.content-wrapper -->
 <footer class="bg-dark text-inverse">
    <div class="container py-13 py-md-15">
        <div class="d-lg-flex flex-row align-items-lg-center">
        <h3 class="display-4 mb-6 mb-lg-0 pe-lg-20 pe-xl-22 pe-xxl-25 text-white">Discuss Your Next Project with Our Experts Today.</h3>
        <a href="{{ route('contact-us') }}" class="btn btn-primary rounded-pill mb-0 text-nowrap">Lets Talk</a>
      </div>
      <hr class="mt-11 mb-12">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <img class="mb-4" src="{{asset($modal->logo)}}" srcset="{{asset($modal->logo)}} 1x" alt="" />
            <p class="fs-12">{!! $modal->about !!}</p>
            <p class="mb-4">© {{ date('Y') }} {{ $modal->site_title }}  <br class="d-none d-lg-block" />All rights reserved.</p>
            <nav class="nav social social-white">
                <a href="{{ $modal->facebook }}" class="uil uil-facebook-f" target="_blank"></a>
                <a href="{{ $modal->twitter }}" class="uil uil-twitter" target="_blank"></a>

                <a href="{{ $modal->pinterest }}" class="uil uil-linkedin" target="_blank"></a>


            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Get in Touch</h4>
            <address class="pe-xl-15 pe-xxl-17">{!! $modal->address !!}</address>
            <a href="mailto:{{ $modal->email }}">{{ $modal->email }}</a><br /> <a href="tel:{{ '+'.$modal->phone }}">+{{ $modal->phone }}</a>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Learn More</h4>
            <ul class="list-unstyled  mb-0">
                @foreach (App\Models\Menu::select('title', 'url')->where('group_id', 1)->where('parent_id', 0)->where('status', 0)->where('type', 2)->get() as $menu)
                <li><a href="{{ $menu->url }}">{{ $menu->title }}</a></li>
            @endforeach

            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-12 col-lg-3">
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Our Newsletter</h4>
            <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-floating">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="news" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer>
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
