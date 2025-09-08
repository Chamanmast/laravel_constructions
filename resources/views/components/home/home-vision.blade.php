<section class="wrapper bg-light">
  <div class="container py-14 py-md-16 text-center">
    <div class="row">
      <div class="col-md-10 col-lg-10 col-xl-10 mx-auto text-center">

        <h2 class="display-4 mb-3">{{ $vision->heading }}</h2>
        <p class="lead fs-lg mb-6 px-xl-10 px-xxl-15">
            {!! $vision->text !!}

        </p>
        <a href="{{ route('contact-us') }}" class="btn btn-primary rounded">Join Us</a>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
