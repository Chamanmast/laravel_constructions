<section class="wrapper bg-gradient-primary">
  <div class="container py-10 py-md-10">
    <h2 class="display-4 mb-3 text-center">Our Projects</h2>
    <p class="lead fs-lg mb-10 text-center px-md-16 px-lg-21 px-xl-0">Here are the latest company news from our blog that got the most attention.</p>
    <div class="swiper-container blog grid-view mb-6" data-margin="30" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
      <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ( $projects as  $project)

             <div class="swiper-slide">
            <article>
              <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="#">
                <img src="{{asset( $project->image) }}" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="post-header">
                {{-- <div class="post-category text-line">
                  <a href="#" class="hover" rel="category">Coding</a>
                </div> --}}
                <!-- /.post-category -->
                <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ $project->slug }}">{{ $project->name }}</a></h2>
              </div>
              <!-- /.post-header -->

              <!-- /.post-footer -->
            </article>
            <!-- /article -->
          </div>
            @endforeach



        </div>
        <!--/.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
    </div>
    <!-- /.swiper-container -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
