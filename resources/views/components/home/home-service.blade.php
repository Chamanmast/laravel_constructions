<section class="wrapper bg-gradient-reverse-primary">
    <div class="container py-10 py-md-14">
          <h2 class="display-4 text-uppercase text-dark mb-3 text-center">Core Services </h2>
            <p class=" mb-5 text-center">Muassasah Mwad AlTshyd delivers advanced control and automation solutions that boost efficiency, enhance safety, and empower smart building operations. Leveraging industry-leading technologies and extensive expertise, our systems are engineered to integrate smoothly with modern infrastructures. From energy optimization to intelligent security and customized automation, we offer scalable, future-proof solutions tailored to the specific requirements of your project — all provided seamlessly under one roof</p>
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-8 align-items-center">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-pills justify-content-center">
                        @php $count = 0; @endphp
                        @foreach ($categories as $cat)
                            <li class="nav-item">
                                <a class="nav-link {{ $count === 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    href="#tab-{{ $cat->id }}">
                                    <i class="uil uil-phone-volume pe-1"></i>
                                    <span>{{ $cat->name }}</span>
                                </a>
                            </li>
                            @php $count++; @endphp
                        @endforeach
                    </ul>
                    <!-- /.nav-tabs -->




                    <div class="tab-content">
                        @php $count = 0; @endphp
                        @foreach ($categories as $cat)
                            <div class="tab-pane fade {{ $count === 0 ? 'show active' : '' }}"
                                id="tab-{{ $cat->id }}">
                                @if ($cat->services && $cat->services->count() > 0)
                                    <div class="row">
                                        @foreach ($cat->services as $service)
                                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                                <div class="card h-100">
                                                    <a href="{{ route('service.details',$service->slug) }}"><img src="{{ asset($service->image ?? '/upload/no_service.jpg') }}"
                                                        alt="{{ $service->name }}" class="card-img-top"></a>

                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $service->name }}</h5>
                                                        <p class="card-text">
                                                            {{ $service->small_text }}
                                                        </p>
                                                        <a href="{{ route('service.details',$service->slug) }}" class="btn btn-outline-gradient gradient-1 rounded-pill"><span>View More</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No services available for this category.</p>
                                @endif
                            </div>
                            @php $count++; @endphp
                        @endforeach

                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
