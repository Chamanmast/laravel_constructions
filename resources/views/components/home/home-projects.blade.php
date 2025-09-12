<section class="wrapper bg-gradient-primary">
    <div class="container py-10 py-md-10">
        <h2 class="display-4 mb-3 text-center">Our Projects</h2>
        <p class="lead fs-lg mb-10 text-center px-md-16 px-lg-21 px-xl-0">Transforming Ideas into Impactful Solutions</p>
        <div class="swiper-container blog grid-view mb-6" data-margin="30" data-dots="true" data-items-xl="3"
		data-items-md="2" data-items-xs="1">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($projects as $project)
					<div class="swiper-slide">
						<article class="post">
						<div class="card">
							<figure class="card-img-top overlay overlay-1 hover-scale">
								<a href="{{ route('project.details', $project->slug) }}">
								<img src="{{ asset($project->image) }}" class="img-fluid fixed-height" alt="" /></a>
								<figcaption>
									<h5 class="from-top mb-0">Read More</h5>
								</figcaption>
							</figure>
							  <div class="card-body text-center">								
								<!-- /.post-category -->
								<h2 class="post-title fs-18 mt-1 mb-3"><a class="link-dark"
									href="{{ route('project.details', $project->slug) }}">{{ $project->name }}</a>
								</h2>
							</div>
							<!-- /.post-header -->
							</div>
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
