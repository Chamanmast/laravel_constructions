<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('category.index') }}">
            <h4 class="">Show All Blog Category</h4>
        </a>
    </div>
    <div class="page-content">
      
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Blog Category</h6>
                        {{-- resources/views/components/backend/backend_component/blog-category-form.blade.php --}}
                        <x-backend.backend_component.blog-category-form :$blogcategory :isEdit="true" />

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-main-layout>
