<x-front-layout>

    @php
        $template = App\Models\SiteSetting::select('site_title', 'meta_description', 'meta_keywords')->find(1);
        $logos =$service->brands($service->brands);
        //$banner =App\Models\Pagebanner::select('image','name')->where('status',0)->where('menu_id',2)->first();

    @endphp
    @section('main')
    @section('title', $template->site_title . '-' . $service->name)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    @section('style')

    @stop
    <x-include.breadcrumb :name="$service->name" />
    <x-service.form :sname="$service->name" :stext="$service->small_text" />

    <x-service.brands :logos="$logos" :sname="$service->name" />

    @section('script')

    @stop
</x-front-layout>
