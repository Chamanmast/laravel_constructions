<x-front-layout>

    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);
        $slider = App\Models\Slider::active(0)->get();
        $testimonials = App\Models\Testimonial::active(0)->get();
        $blogs = App\Models\Blog::select('post_title','post_slug','post_image','short_descp')->active(0)->front(1)->get();
        $module = App\Models\Module::select('heading', 'image', 'text')->find(4);
        $categories = App\Models\Category::with('services:category_id,name,slug,image,small_text')->select('id','name')->whereFront(1)->whereType(0)->get();

$projects = App\Models\Project::active(0)->get();

    @endphp
    @section('main')
    @section('title', $template->site_title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <x-home.home-slider :$slider />
    <x-home.home-about :about='$module' />
    <x-home.home-values />
    <x-home.home-service  :$categories/>
    <x-home.home-testimonials :$testimonials />
    {{-- <x-home.home-blog  :$blogs /> --}}
     <x-home.home-vision   />
     <x-home.home-projects  :$projects />
    {{-- <x-home.home-call   /> --}}
    @section('script')
    @stop
</x-front-layout>
