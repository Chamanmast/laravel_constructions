
<div class="divider-icon my-8"><i class="uil uil-heart"></i></div>
<section class="wrapper bg-light">
    <div class="container py-5 pt-md-10 pb-md-15">
        <h2 class="fs-15 text-uppercase text-muted text-center mb-8">Trusted by Global Leaders</h2>


        <div class="row gx-0 gx-md-8 gx-xl-12 gy-8 align-items-center">
            @foreach ($brands as $logo)
                <div class="col-4 col-md-2">
                    <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4">
                        <img src="{{ asset($logo->image) }}" alt="">
                    </figure>
                </div>
            @endforeach

            <!--/column -->

            <!--/.row -->
        </div>
    </div>
</section>

