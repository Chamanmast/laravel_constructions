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

    <x-service.brands :logos="$logos" />

    @section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const f = document.getElementById('service-enquiry-form');
    if (!f) return console.log('service form not found');
    console.log('form action:', f.getAttribute('action'));
    console.log('form method:', f.method);
    console.log('has csrf token:', !!f.querySelector('input[name="_token"]'));
    f.addEventListener('submit', function (e) {
        console.log('submit event fired');
        // do not prevent default here — only logging
    });
    const btn = f.querySelector('input[type="submit"], button[type="submit"]');
    if (btn) btn.addEventListener('click', () => console.log('submit clicked'));
});
</script>
    @stop
</x-front-layout>
