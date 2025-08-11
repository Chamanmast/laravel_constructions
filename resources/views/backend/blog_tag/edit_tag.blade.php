<x-main-layout>
    @section('title', breadcrumb())
 <div class="seperator-header layout-top-spacing">
        <a href="{{ route('tag.index') }}">
            <h4 class="">Show Blog Tag</h4>
        </a>
    </div>
    <div class="page-content">
        

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Tag</h6>
                         {{-- resources/views/components/backend/backend_component/blog-tag-form.blade.php --}}
                         <x-backend.backend_component.blog-tag-form  :$tag :isEdit="true" />

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
