@php
if (!empty($image)) {
$small_img = $image;
} else {
$small_img = asset('/upload/no_image.jpg'); # code...
}
@endphp
<div class="project item col-md-6 col-xl-4 {{strtolower($cat)}}">
    <figure class="overlay overlay-1 rounded"><a href="{{$image}}" data-glightbox data-gallery="shots-group">
         <img src="{{$image}}" alt="" /></a>
      <figcaption>
        <h5 class="from-top mb-0">{{$name}}</h5>
        <p>{{$text}}</p>  
      </figcaption>
    </figure>
  </div>