<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('menugroup.index') }}">
            <h4 class="">Show Menu Group</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Menu Group</h6>

                          {{-- resources/views/components/backend/backend_component/menu-group-form.blade.php --}}
                          <x-backend.backend_component.menu-group-form  :isEdit="false" />


                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
