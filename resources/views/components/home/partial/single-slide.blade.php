@php
    if (!empty($image)) {
        $small_img = $image;
    } else {
        $small_img = asset('/upload/no_image.jpg'); # code...
    }
    if($style==0){
        $newstyle='col-md-10 offset-md-1 col-lg-7 offset-lg-0 col-xl-6 col-xxl-5 text-center text-lg-start justify-content-center align-self-center align-items-start';
    } elseif($style==1)
    {
        $newstyle='col-md-11 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center justify-content-center align-self-center'; 
    }else
    {
        $newstyle='col-md-10 offset-md-1 col-lg-7 offset-lg-5 col-xl-6 offset-xl-6 col-xxl-5 offset-xxl-6 text-center text-lg-start justify-content-center align-self-center align-items-start';
    }
@endphp
<div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image"
    data-image-src="{{ $small_img }}">
    <div class="container h-100">
        <div class="row h-100">
            <div
                class="{{$newstyle}}">
                <h2 class="display-1 fs-56 mb-4 text-white animate__animated animate__slideInDown animate__delay-1s">{{$title}}</h2>
                <p class="lead fs-23 lh-sm mb-7 text-white animate__animated animate__slideInRight animate__delay-2s">{{$stitle}}</p>
                <div class="animate__animated animate__slideInUp animate__delay-3s"><a href="{{$link}}"
                        class="btn btn-lg btn-outline-white rounded-pill">Read More</a></div>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!--/.container -->
</div>
