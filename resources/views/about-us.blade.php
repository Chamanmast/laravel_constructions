<x-front-layout>
    @php
        $template = App\Models\SiteSetting::select(
            'site_title',
            'meta_description',
            'company_address',
            'email',
            'support_phone',
            'meta_keywords',
        )->find(1);
        //dd($module2);
        //$modal8 = App\Models\Module::select('heading', 'image', 'text')->find(8);
        // $modal9 = App\Models\Module::select('heading', 'image', 'text')->find(9);
        // $modal11 = App\Models\Module::select('heading', 'image', 'text', 'small_text')->find(11);
        $modal12 = App\Models\Module::select('small_text', 'image')->find(12);
        $url = Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();
        $banner = App\Models\Pagebanner::select('image', 'name')
            ->where('status', 0)
            ->where('menu_id', $menu->id)
            ->first();
        //dd($banner  );
    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <x-pagebanner :title='$menu->title' :image='asset($banner->image)'></x-pagebanner>
    <x-about.who> </x-about.who>
    <!-- /section -->
    <x-about.testimonials> </x-about.testimonials>
    <x-about.team></x-about.team>
    <x-home.home-counter></x-home.home-counter>

    <x-about.contact :email='$template->email' :address='$template->company_address' :heading='$modal12->small_text' :image='$modal12->image'
        :phone='$template->support_phone'></x-about.contact>

</x-front-layout>
