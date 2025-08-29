<x-front-layout>
	
    @php
    $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
	
    $banner =App\Models\Pagebanner::select('image','name')->where('status',0)->where('menu_id',2)->first();
    @endphp
    @section('main')
    @section('title', $template->site_title ."-".$service->name)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    @php
    if (!empty($service->large_image)) {
    $small_img = $service->large_image;
    } else {
    $small_img = url('/').'/upload/no_image.jpg'; # code...
    }
    @endphp
	@section('style')
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
	{{pagebanner(asset($banner->image))}}
	@stop
    <div class="blogCntr">
        <div class="bannerimg">
            <h3>{{$banner->name}}</h3>
		</div>
		
		<div class="why-choose-us-am">
			<h3>{{$service->name}}</h3>
		</div>
		<div class="left-side-box">
			<img src="{{ $small_img}}" alt="{{$service->name}}" class="img-thumbnail" />
		</div>
		<div class="right-side-box">
			{!! $service->text !!}
		</div>
	</div>
	
</div>

</x-front-layout>
