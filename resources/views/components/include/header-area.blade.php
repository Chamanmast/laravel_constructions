@php
    $modal = $template;
    $phone = str_replace('-', '', $modal->support_phone);

@endphp
<header class="wrapper bg-soft-primary">
    <nav class="navbar navbar-expand-lg center-nav transparent position-absolute navbar-dark header-bg caret-none">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="index.php">
                    <span>
                        <img class="logo-dark" src="{{ asset($modal->logo) }}" srcset="{{ asset($modal->logo) }} 2x"
                            alt="{{ $modal->site_title }}" />
                        <img class="logo-light" src="{{ asset($modal->logo) }}" srcset="{{ asset($modal->logo) }} 2x"
                            alt="{{ $modal->site_title }}" /></span>
                    <span class="text-white fw-light mlogo fs-26 ">{{ $modal->site_title }}</span>
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <a href="index.php">
                        <img src="{{ asset($modal->logo) }}" srcset="{{ asset($modal->logo) }} 4x"
                            alt="{{ $modal->site_title }}" />
                        <span class="text-white fs-16 slogo fw-light">
                            {{ $modal->site_title }}</span></a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">

                        <li class="{{ request()->is('/') == 1 ? 'active' : '' }} nav-item"><a
                                href="{{ route('home') }}" class="nav-link">Home</a></li>
                        @foreach ($menus as $menu)
                            <li
                                class="{{ active_class($menu->url) }} {{ $menu->url == 'contact-us' ? 'contact' : '' }} ">
                                <a href="{{ $menu->url != '#' && $menu->type == 2 ? route($menu->url) : $menu->url }}"
                                    class="nav-link" {{ $menu->type == 1 ? 'target="_blank"' : '' }}>{{ $menu->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="d-lg-none mt-auto pt-6 pb-6 order-4">
                        <a href="mailto:{{ $modal->email }}" class="link-inverse fs-12">{{ $modal->email }}</a>
                        <br /> <a href="tel:{{ '+91' . $phone }}" class="fs-12">+91-{{ $phone }}</a> <br />
                        <nav class="nav social social-white mt-4">
                            <a href="{{ $modal->twitter }}"><i class="uil uil-twitter"></i></a>
                            <a href="{{ $modal->facebook }}"><i class="uil uil-facebook-f"></i></a>
                            {{-- <a href="{{ $modal->gplus }}"><i class="uil uil-gplus"></i></a> --}}
                            <a href="{{ $modal->linkdin }}"><i class="uil uil-linkedin"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /offcanvas-nav-other -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <div class="navbar-other w-50 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
        
                  
                  <li class="nav-item d-lg-none">
                    <button class="hamburger offcanvas-nav-btn text-white"><span></span></button>
                  </li>
                </ul>
                <!-- /.navbar-nav -->
              </div>
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
    <div class="offcanvas offcanvas-top bg-light" id="offcanvas-search" data-bs-scroll="true">
        <div class="container d-flex flex-row py-6">
          <form class="search-form w-100">
            <input id="search-form" type="text" class="form-control" placeholder="Type keyword and hit enter">
          </form>
          <!-- /.search-form -->
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- /.container -->
      </div>
</header>
