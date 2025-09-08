<section id="brands" class="wrapper bg-light">
  <div class="container py-14 py-md-10">
    <h2 class="fs-15 text-uppercase text-muted text-center mb-3">Out Partners</h2>
    <div class="row gx-lg-8 mb-10 gy-5">

    </div>
    <!-- /.row -->
    <div  class="row row-cols-2 row-cols-md-3 row-cols-xl-5 gx-lg-6 gy-6 justify-content-center">
        @foreach ( $logos as $logo )
             <div class="col">
        <div class="card shadow-lg h-100 align-items-center">
          <div class="card-body align-items-center d-flex px-3 py-6 p-md-8">
            <figure class="px-md-3 px-xl-0 px-xxl-3 mb-0">
                @if($logo->image)
                <img src="{{ asset($logo->image) }}" alt="" />
                @endif
                 <p class="text-center pt-3 fw-bold">{{ $logo->name }}</p>
            </figure>

          </div>
          <!--/.card-body -->
        </div>
        <!--/.card -->
      </div>
        @endforeach

      <!--/column -->

    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
