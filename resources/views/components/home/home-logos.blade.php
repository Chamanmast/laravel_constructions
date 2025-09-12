
<div class="divider-icon my-8"><i class="uil uil-heart"></i></div>
<section class="wrapper bg-light">
    <div class="container py-5 pt-md-10 pb-md-15">
        <h2 class="display-4 text-uppercase text-dark text-center mb-8">Our Partners</h2>
		
		
        <div class="row gx-0 gx-md-8 gx-xl-12 gy-8 align-items-center">
			<div class="swiper-container dots-closer mb-6" data-margin="0" data-loop="true" data-autoplay="true" data-dots="false" data-items-md="6"  data-items-xs="1">
				<div class="swiper">
					<div class="swiper-wrapper">
						@foreach ($brands as $logo)
						<div class="swiper-slide">
							<div class="item-inner">
								
								
									<figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4">
										<img src="{{ asset($logo->image) }}" alt="">
									</figure>
								</div> </div> 
								@endforeach
								
								<!--/column -->
					</div>  </div>  </div>
					<!--/.row -->
		</div>
	</div>
</section>

