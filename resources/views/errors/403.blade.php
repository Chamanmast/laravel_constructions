<x-errors-layout>
    @php
        $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
    @endphp
    @section('main')
    @section('title', '403 - Authentication error')
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)


    <div class="container-fluid error-content">
      <div class="">
          <h1 class="error-number">403</h1>
          <p class="mini-text">Authentication error.</p>
          <p class="error-text mb-5 mt-1">The page you requested was not found!</p>
          <img src="{{asset('backend/assets/src/assets/img/error.svg')}}" alt="cork-admin-404" class="error-img">
          <a href="{{ url('/') }}" class="btn btn-dark mt-5">Go Back</a>
      </div>
  </div>


</x-front-layout>
