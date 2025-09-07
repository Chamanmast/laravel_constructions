@php
    if (!empty($image)) {
        $small_img = $image;
    } else {
        $small_img = asset('/upload/no_image.jpg'); # code...
    }
@endphp
<article class="item post col-md-4">
    <div class="card">
        <figure class="card-img-top overlay overlay-1 hover-scale">
            <a href="{{ $slug }}">
                <img src="{{ $small_img }}" alt="{{ $title }}" /></a>
            <figcaption>
                <h5 class="from-top mb-0">Read More</h5>
            </figcaption>
        </figure>
        <div class="card-body">
            <div class="post-header">
                <div class="post-category text-line">
                    <a href="#" class="hover" rel="category">{{$category}}</a>
                </div>
                <!-- /.post-category -->
                <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark"
                        href="{{ $slug }}">{{ $title }}</a></h2>
            </div>
            <!-- /.post-header -->
            <div class="post-content">
                {!! $text !!}
            </div>
            <!-- /.post-content -->
        </div>
        <!--/.card-body -->
        <div class="card-footer">
            <ul class="post-meta d-flex mb-0">
                <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $created }}</span></li>

            </ul>
            <!-- /.post-meta -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</article>
