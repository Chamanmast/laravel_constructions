<x-front-layout>
    @php
       $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);

        $popular = App\Models\Blog::select('post_image', 'post_title', 'post_slug', 'short_descp', 'created_at')

            ->active(0)
            ->get();
        $category = App\Models\Blogcategory::select('category_name')->withCount('blogs')->get();
        $tags = App\Models\Blogtag::select('tag_name')->get();
    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $blog->post_title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @php
        if (!empty($blog->post_image)) {
            $small_img = $blog->post_image;
        } else {
            $small_img = '/upload/no_image.jpg'; # code...
        }
    @endphp

   <x-include.breadcrumb :name="$blog->post_title"/>
    <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12">
            <div class="col-lg-8">
                <div class="blog single">
                    <div class="card">
                        <figure class="card-img-top"><img src="{{ asset($small_img) }}" alt=""></figure>
                        <div class="card-body">
                            <div class="classic-view">
                                <article class="post">
                                    <div class="post-content mb-5">
                                        <a href="#" class="hover"
                                            rel="category">{{ $blog->category->category_name }}</a>
                                        {!! $blog->long_descp !!}
                                    </div>
                                    <!-- /.post-content -->
                                    <div
                                        class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
                                        <div>
                                            <ul class="list-unstyled tag-list mb-0">
                                               @foreach($blog->getRelatedTags($blog->post_tags) as $tag)
                                                <li><a href="#"
                                                        class="btn btn-soft-ash btn-sm rounded-pill mb-0">{{$tag->tag_name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="mb-0 mb-md-2">

                                            <!--/.share-dropdown -->
                                        </div>
                                    </div>
                                    <!-- /.post-footer -->
                                </article>
                                <!-- /.post -->
                            </div>
                            <!-- /.classic-view -->
                            <hr>

                            <!-- /.swiper-container -->

                            <!-- /.comment-form -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.blog -->
            </div>
            <!-- /column -->
            <aside class="col-lg-4 sidebar mt-11 mt-lg-6">

                <!-- /.widget -->
                <div class="widget">
                    <h4 class="widget-title mb-3">About Us</h4>
                    <p>{{ $template->about }}</p>
                    <nav class="nav social">
                        <a href="{{ $template->twitter }}"><i class="uil uil-twitter"></i></a>
                        <a href="{{ $template->facebook }}"><i class="uil uil-facebook-f"></i></a>
                        <a href="{{ $template->gplus }}"><i class="uil uil-gplus"></i></a>
                        <a href="{{ $template->linkdin }}"><i class="uil uil-linkdin"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
                <div class="widget">
                    <h4 class="widget-title mb-3">Popular Posts</h4>
                    <ul class="image-list">
                        @foreach ($popular as $blog)
                            @php
                                if (!empty($blog->post_image)) {
                                    $img = explode('.', $blog->post_image);
                                    $small_img = $img[0] . '_thumb.' . $img[1];
                                } else {
                                    $small_img = url('/') . '/upload/no_image.jpg'; # code...
                                }
                                $slug = route('blog.details', $blog->post_slug);
                            @endphp
                            <li>
                                <figure class="rounded"><a href="{{ $slug }}"><img src="{{ asset($small_img) }}"
                                            alt=""></a></figure>
                                <div class="post-content">
                                    <h6 class="mb-2"> <a class="link-dark"
                                            href="{{ $slug }}">{{ $blog->post_title }}</a> </h6>
                                    <ul class="post-meta">
                                        <li class="post-date"><i
                                                class="uil uil-calendar-alt"></i><span>{{ $blog->created_at->format('M d, Y') }}</span>
                                        </li>

                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <!-- /.image-list -->
                </div>
                <!-- /.widget -->
                <div class="widget">
                    <h4 class="widget-title mb-3">Categories</h4>
                    <ul class="unordered-list bullet-primary text-reset">
                        @foreach ($category as $cat)
                            <li><a href="#">{{ $cat->category_name }} ({{ $cat->blogs_count }})</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.widget -->
                <div class="widget">
                    <h4 class="widget-title mb-3">Tags</h4>
                    <ul class="list-unstyled tag-list">
                        @foreach ($tags as $tag)
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">{{ $tag->tag_name }}</a>
                            </li>
                        @endforeach


                    </ul>
                </div>

            </aside>
            <!-- /column .sidebar -->
        </div>
        <!-- /.row -->
    </div>

</x-front-layout>
