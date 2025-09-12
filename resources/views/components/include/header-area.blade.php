@php
    $modal = $template;
    $phone = str_replace('-', '', $modal->support_phone);

@endphp

<header class="wrapper bg-soft-primary">
    <nav
        class="navbar navbar-expand-lg center-nav transparent position-absolute {{ $home ? '' : 'bg-dark py-1' }}  navbar-dark  caret-none">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="{{ route('home') }}">
                    <span>
                        <img class="logo-dark" src="{{ asset($modal->logo) }}" srcset="{{ asset($modal->logo) }} 1x"
                            alt="{{ $modal->site_title }}" />
                        <img class="logo-light" src="{{ asset($modal->logo) }}" srcset="{{ asset($modal->logo) }} 1x"
                            alt="{{ $modal->site_title }}" /></span>


                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start py-1">
                <div class="offcanvas-header d-lg-none">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($modal->logo) }}" srcset="{{ asset($modal->logo) }} 2x"
                            alt="{{ $modal->site_title }}" />
                        </a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        {{-- Home Menu Item --}}
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>

                        {{-- Dynamic Menu Items --}}
                        @foreach ($menus as $menu)
                            @php
                                $hasDropdown = $menu->children->isNotEmpty() || $menu->megamenu;
                                $isActive = active_class($menu->url);
                                $isServicesActive = Request::is('services*') && $menu->megamenu;

                                $navClasses = [
                                    'nav-item',
                                    $hasDropdown ? 'dropdown' : '',
                                    $menu->megamenu ? 'dropdown-mega' : '',
                                    $isActive ?: '',
                                ];

                                $linkClasses = [
                                    'nav-link',
                                    $hasDropdown ? 'dropdown-toggle' : '',
                                    $isActive ?: '',
                                    $isServicesActive ? 'active' : '',
                                ];
                            @endphp
                            @if ($menu->parent_id === 0)
                                <li class="{{ implode(' ', array_filter($navClasses)) }}">
                                    <a href="{{  $menu->getUrl() }}"
                                        class="{{ implode(' ', array_filter($linkClasses)) }}"
                                        @if ($hasDropdown) data-bs-toggle="dropdown" aria-expanded="false"  role="button" @endif
                                        @if ($menu->type == 1) target="_blank" @endif>
                                        {{ $menu->title }}
                                    </a>

                                    {{-- Regular Dropdown Menu --}}
                                    @if ($menu->children->isNotEmpty())
                                        <ul class="dropdown-menu">
                                            @foreach ($menu->children as $child)
                                                <li>
                                                    <a class="dropdown-item {{ active_class($child->url) }} fs-12"
                                                        href="{{ $child->attachment ? asset($child->attachment) : $child->getUrl() }}"
                                                        @if ($child->type == 1) target="_blank" @endif>
                                                        {{ $child->title }}
                                                    </a>

                                                    {{-- Sub-dropdown for third level --}}
                                                    @if ($child->children->isNotEmpty())
                                                        <ul class="dropdown-menu dropdown-submenu">
                                                            @foreach ($child->children as $subChild)
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ $subChild->getUrl() }}"
                                                                        @if ($subChild->type == 1) target="_blank" @endif>
                                                                        {{ $subChild->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    {{-- Mega Menu --}}
                                    @if ($menu->megamenu)
                                        <ul class="dropdown-menu mega-menu">
                                            <li class="mega-menu-content">
                                                <div class="row gx-0 gx-lg-1">
                                                    @foreach ($menu->megaMenus as $megaMenu)
                                                        <div
                                                            class="col-lg-3 mgs{{ $megaMenu->id }} {{ $megaMenu->isHidden() ? 'd-none d-sm-block' : '' }}">
                                                            <h6 class="dropdown-header fw-bolder pb-0">
                                                                {!! $megaMenu->title !!}
                                                            </h6>
                                                            <ul class="list-unstyled pb-5 f-13">
                                                                @foreach ($megaMenu->services as $service)
                                                                    @php
                                                                        $serviceUrl = route(
                                                                            'service.details',
                                                                            $service->slug,
                                                                        );
                                                                        $isCurrent = request()->url() === $serviceUrl;
                                                                    @endphp
                                                                    <li>
                                                                        <a class="dropdown-item {{ $isCurrent ? 'current' : '' }} fs-12"
                                                                            href="{{ $serviceUrl }}">
                                                                            <i
                                                                                class="uil uil-angle-double-right {{ $isCurrent ? 'text-dark' : 'text-primary' }} fw-bold"></i>
                                                                            <span
                                                                                class="sname">{{ $service->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>

                    <!-- /.navbar-nav -->
                    <div class="d-lg-none mt-auto pt-6 pb-6 order-4">
                        <a href="mailto:{{ $modal->email }}"
                            class="link-inverse text-dark fs-12">{{ $modal->email }}</a>
                        <br /> <a href="tel:{{ '+91' . $phone }}" class="fs-12  text-dark">+{{ $modal->phone }}</a>
                        <br />
                        <nav class="nav social social-dark mt-4">
                            <a href="{{ $modal->twitter }}"><i class="uil uil-multiply fw-bold"></i></a>
                            <!-- <a href="{{ $modal->facebook }}"><i class="uil uil-facebook-f"></i></a> -->
                            <!-- <a href="{{ $modal->gplus }}"><i class="uil uil-gplus"></i></a>  -->
                            <a href="{{ $modal->linkdin }}"><i class="uil uil-linkedin-alt"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /offcanvas-nav-other -->

                </div>
                <!-- /.offcanvas-body -->
            </div>
            <div class="navbar-other ms-lg-4">
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
        </div>
        <!-- /.container -->
    </nav>

</header>
