<x-front-layout>

@php
        $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);

    @endphp
    @section('main')
    @section('title', $template->site_title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)


<x-home.home-slider/>


      @section('script')
       @stop
</x-front-layout>
