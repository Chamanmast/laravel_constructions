<x-front-layout>
	@php
	$template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
	$url=Route::getCurrentRoute()->uri;
	$menu =App\Models\Menu::select('title','id')->where('url',$url)->first();
	$banner =App\Models\Pagebanner::select('image','name')->where('status',0)->where('menu_id',$menu->id)->first();
	#dd($banner);
    @endphp
    @section('main')
    @section('title', $template->site_title ."-".$menu->title)
	@section('meta_description', $template->meta_description)
	@section('meta_keywords', $template->meta_keywords)
	
	<x-pagebanner :title='$menu->title' :image='asset($banner->image)'></x-pagebanner>

	<div class="container pt-10 pb-14 pb-md-16">
		<div class="row">
			<div class="blog grid grid-view">
	
				<div class="row isotope gx-md-8 gy-8 mb-8">
					@foreach($blogs as $blog)
					@php
					if (!empty($blog->post_image)) {
					$img = explode('.', $blog->post_image);
					$small_img = $img[0] . '_blog_image_front.' . $img[1];
					} else {
					$small_img = '/upload/no_image.jpg'; # code...
					}
					$slug=route('blog.details',$blog->post_slug);
					@endphp
					<x-blog.single :category="($blog->category->category_name)" :title="($blog->post_title)" :$slug :image="$small_img" :text="(Str::limit($blog->short_descp, '450', '....'))" :created="($blog->created_at->format('M d, Y'))" :user="($blog->user?->name)">
						
					</x-blog.single>
					@endforeach
				   
					<!-- /.post -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.blog -->
			<nav class="d-flex" aria-label="pagination">

				{{ $blogs->links() }}				
				<!-- /.pagination -->
			</nav>
			<!-- /nav -->
		</div>
	</div>	
</x-front-layout>
