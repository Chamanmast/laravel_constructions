<x-errors-layout>
      @php
        $template = App\Models\SiteSetting::select('site_title','meta_description','meta_keywords')->find(1);
          @endphp
    @section('main')
    @section('title', '419 - Page Expired')
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)



    <div class="container-fluid error-content">
      <div class="">
          <h1 class="error-number">419</h1>
          <p class="mini-text">Page Expired</p>
          <p class="error-text mb-5 mt-1">Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
          <img src="{{asset('backend/assets/src/assets/img/error.svg')}}" alt="cork-admin-404" class="error-img">
          <a href="{{ url('/') }}" class="btn btn-dark mt-5">Go Back</a>
      </div>
  </div>

</x-errors-layout>
