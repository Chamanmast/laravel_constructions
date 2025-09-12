<section class="wrapper bg-soft-primary">
      <div class="container pt-16 pb-6 pt-md-16 pb-md-8 text-center">
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mx-auto">
            <h1 class="fs-40 mb-3">{{ $name }}</h1>
            <nav class="d-inline-block" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
              </ol>
            </nav>
            <!-- /nav -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
