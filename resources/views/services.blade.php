<x-front-layout>
    @php
    $i=1;
        $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
        $services =App\Models\Service::select('id','name','icon','small_text','text')->type(12)->active(0)->get();
        $services9=App\Models\Service::select('id','name', 'small_text','image','text')->type(9)->active(0)->get();
        $services10=App\Models\Service::select('id','name','small_text','image')->type(10)->active(0)->get();
        $modal13 =App\Models\Module::select('small_text','text')->find(13);
        $modal14 =App\Models\Module::select('small_text','text')->find(14);
        $modal15 =App\Models\Module::select('small_text','text')->find(15);
        $url=Route::getCurrentRoute()->uri;
        $menu = App\Models\Menu::select('title', 'id')->where('url', $url)->first();
        $banner = App\Models\Pagebanner::select('image', 'name')
            ->where('status', 0)
            ->where('menu_id', $menu->id)
            ->first();

        //dd($module2);
    @endphp
    @section('main')
    @section('title', $template->site_title ."-".$menu->title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    <x-pagebanner :title='$menu->title' :image='asset($banner->image)'></x-pagebanner>

   

    <x-service.what></x-service.what> 
    <x-service.crawler></x-service.crawler> 
    <x-service.leading></x-service.leading> 
    <x-service.process></x-service.process> 

  
    
    </x-front-layout>
