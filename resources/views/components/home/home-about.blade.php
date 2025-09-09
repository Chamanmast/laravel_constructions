<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
      <div class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative">
        <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; right: -1.9rem;"></div>
        <figure class="rounded"><img src="{{ asset($about->image) }}" srcset="{{ asset($about->image) }} 2x" alt=""></figure>
      </div>
      <!--/column -->
      <div class="col-lg-6">
        <h2 class="display-4 mb-3">{{ $about->heading }}</h2>
        <p class="lead ">{!! $about->text !!}</p>

        <!--/.row -->
      </div>

      <!--/column -->
    </div>
    <!--/.row -->
  </div>

  <!-- /.container -->
</section>
<!-- /section -->


