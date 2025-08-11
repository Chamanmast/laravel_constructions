<x-main-layout>
    @section('title', breadcrumb())

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('roles.index') }}">
            <h4 class="">All Roles</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Role</h6>
                        {{-- resources/views/components/backend/backend_component/role-form.blade.php --}}
                        <x-backend.backend_component.role-form :isEdit="false" />

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
