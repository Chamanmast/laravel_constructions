<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);
        $logos =$project->brands($project->brand);
    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $project->name)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @php
        if (!empty($project->image)) {
            $small_img = $project->image;
        } else {
            $small_img = '/upload/no_image.jpg'; # code...
        }
    @endphp
    <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{ asset($small_img) }}">
        <div class="container pt-17 pb-12 pt-md-19 pb-md-16 text-center">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <div class="post-header">
                        <div class="post-category text-line text-white">
                            <a href="#" class="text-reset" rel="category">{{ $project->client }}</a>
                        </div>
                        <!-- /.post-category -->
                        <h1 class="display-1 mb-3 text-white">{{ $project->name }}</h1>
                        <p class="lead px-md-12 px-lg-12 px-xl-15 px-xxl-18">{{ $project->location }}</p>
                    </div>
                    <!-- /.post-header -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light wrapper-border">
        <div class="container pt-14 pt-md-16 pb-13 pb-md-15">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <article>
                        <h2 class="display-6 mb-4">About the Project</h2>
                        <div class="row gx-0">
                            <div class="col-md-12 text-justify">
                                <p>{{ $project->stext }}</p>
                                {!! $project->text !!}
                            </div>
                            <!--/column -->
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Client</h5>
                                            <p class="card-text">{{ $project->client }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Contractor</h5>
                                            <p class="card-text">{{ $project->contractor }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Specialist Supplier</h5>
                                            <p class="card-text">{{ $project->specialist_supplier }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Location</h5>
                                            <p class="card-text">{{ $project->location }}</p>
                                        </div>
                                    </div>
                                </div>
                                  <x-service.brands :logos="$logos" />
                                <div class="col-md-12 text-center mt-3">
                                    <a href="{{ route('projects') }}" class="btn btn-outline-primary">See Project</a>
                                </div>
                            </div>

                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </article>
                    <!-- /.project -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <!-- /.container-fluid -->
    </section>
    <!-- /section -->
</x-front-layout>
