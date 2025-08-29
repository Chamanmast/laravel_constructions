
{{-- {{dd($slider)}} --}}
<section class="wrapper bg-dark">
    <div class="swiper-container swiper-hero dots-over" data-margin="0" data-autoplay="true" data-autoplaytime="7000"
        data-nav="true" data-loop="true" data-dots="true" data-items="1">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($slider as $slide)
                    <x-home.partial.single-slide :title='$slide->title' :stitle='$slide->sub_title' :link='$slide->link'
                      :style='$slide->style' :image='asset($slide->image)' />
                @endforeach
            </div>
            <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
    </div>
    <!-- /.swiper-container -->
</section>
