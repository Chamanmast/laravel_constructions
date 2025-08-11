<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
    $template = App\Models\SiteSetting::select(     
        'site_title',
        'logo', 
        'favicon',  
        'email',
        'support_phone',
        'facebook',
        'twitter',
        'gplus',
        'linkdin',
         )->find(1);
    $menus=  App\Models\Menu::select('url','title','type')->active(0)->get();
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Place favicon.ico in the root directory -->
    <title>@yield('title') </title>
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset($template->favicon) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS here -->
   
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">  
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/colors/sky.css') }}">
   
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @yield('style')
    <!-- End layout styles -->
</head>

<body>
    <div class="content-wrapper">
  <!-- header-top area start -->
        <x-include.header-area :$template :$menus />
        <!-- header-top area end -->


        {{ $slot }}

    </div>
        <!-- footer area start -->
        <x-include.footer-area></x-include.footer-area>
        <!-- footer area end -->

             <!-- Extra js for this page -->
        @yield('script')
</body>


</html>
