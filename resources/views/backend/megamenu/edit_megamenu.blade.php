<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('megamenu.index') }}">
            <h4 class="">Show Mega Menu</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Mega Menu</h6>
                        {{-- resources/views/components/backend/backend_component/mega-menu-form.blade.php --}}
                        <x-backend.backend_component.mega-menu-form :$menus  :$services :$megamenu :isEdit="true" />


                    </div>
                </div>
            </div>
        </div>

    </div>

        @section('script')
    <script>
       
        $(".taggings").select2({
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
            tags: true,
            allowClear: true,
        });
    </script>
    @stop
</x-main-layout>
