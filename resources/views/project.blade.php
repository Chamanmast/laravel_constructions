<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);

        $url = Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();

    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <x-include.breadcrumb :name="$menu->title" />


    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pt-9 pt-md-11 pb-14 pb-md-16">
            <div class="projects-overflow mt-md-10 mb-10 mb-lg-15">
                @foreach ($projects as $project)
                    @php
                        // Determine layout based on even or odd id
                        $side =
                            $project->id % 2 == 0
                                ? 'col-lg-8 col-xl-7 offset-xl-1 rounded'
                                : 'col-lg-7 offset-lg-5 col-xl-6 offset-xl-5 rounded';

                        // Image handling
                        if (!empty($project->image)) {
                            $img = explode('.', $project->image);
                            $small_img = $img[0] . '_projectfolio_image.' . $img[1];
                        } else {
                            $small_img = url('/') . '/upload/no_projectfolio.jpg';
                        }

                        // Styling adjustments
                        $positionStyle = $project->id % 2 == 0 ? 'right: 10%; bottom: 25%;' : 'left: 18%; bottom: 25%;';

                        // Optional category color classes
                        $colorClass = $project->id % 2 == 0 ? 'text-purple' : 'text-leaf';
                        $linkClass = $project->id % 2 == 0 ? 'link-purple' : 'link-leaf';
                    @endphp

                    <div class="project item">
                        <div class="row">
                            <figure class="{{ $side }}">
                                <img src="{{ asset($project->image ?: 'upload/no_projectfolio.jpg') }}" alt="" />
                            </figure>
                            <div class="project-details d-flex justify-content-center flex-column"
                                style="{{ $positionStyle }}">
                                <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                    <div class="card-body">
                                        <div class="post-header">
                                            <div class="post-category text-line {{ $colorClass }} mb-3">
                                                {{ $project->location }}</div>
                                            <h2 class="post-title mb-3">{{ $project->name ?? 'Project Title' }}</h2>
                                        </div>
                                        <!-- /.post-header -->
                                        <div class="post-content">
                                             <p>{{ $project->stext }}</p>

                                            <a href=" {{ route('project.details',$project->slug) }}" class="more hover {{ $linkClass }}">See Project</a>
                                        </div>
                                        <!-- /.post-content -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.project-details -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.project -->
                @endforeach

            </div>

            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->


    <!-- /section -->
</x-front-layout>
