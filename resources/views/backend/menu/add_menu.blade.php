<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('menus.index') }}">
            <h4 class="">Show Menu</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Menu</h6>

                         {{-- resources/views/components/backend/backend_component/menu-form.blade.php --}}
                         <x-backend.backend_component.menu-form :$menus :$type :$menugroup  :isEdit="false" />


                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
