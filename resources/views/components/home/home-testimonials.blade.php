<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
        <div class="row gx-xl-12 gy-10">
            <div class="col-xl-4">
                <h2 class="display-4 mt-10 mb-3">Client Voices</h2>
                <p class="lead fs-lg mb-6">Stories of smarter buildings, safer spaces, and smoother operations.</p>
                <a href="#" class="btn btn-primary rounded-pill">All Testimonials</a>
            </div>
            <!-- /column -->
            <div class="col-xl-8">
                <div class="position-relative">
                    <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1"
                        style="top: -0.7rem; right: -1.7rem;"></div>
                    <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1"
                        style="bottom: -0.5rem; left: -1.4rem;"></div>
                    <div class="swiper-container dots-closer mb-6" data-margin="0" data-loop="true" data-autoplay="true" data-dots="false" data-items-md="2"
                        data-items-xs="1">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $t)
                                    <div class="swiper-slide">
                                        <div class="item-inner">
                                            <div class="card">
                                                <div class="card-body">
                                                    <blockquote class="icon mb-0">
                                                        <p>{{ $t->text }}</p>
                                                        <div class="blockquote-details">

                                                            <div class="info">
                                                                <h5 class="mb-1">{{ $t->name }}</h5>
                                                                <p class="mb-0">{{ $t->designation }}</p>
                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                                <!--/.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.item-inner -->
                                    </div>
                                @endforeach

                                <!--/.swiper-slide -->
                            </div>
                            <!--/.swiper-wrapper -->
                        </div>
                        <!-- /.swiper -->
                    </div>
                    <!-- /.swiper-container -->
                </div>
                <!-- /.position-relative -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
