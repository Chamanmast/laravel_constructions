<x-dashboard-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('testimonials.index') }}">
            <h4 class="">Show Testimonial</h4>
        </a>
    </div>

    
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Testimonial</h6>

                        {{-- resources/views/components/backend/backend_component/testimonial-form.blade.php --}}
                        <x-backend.backend_component.testimonial-form :$testimonial :isEdit="true" />

                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('script')

        <script src="{{ asset('backend/assets/src/plugins/src/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
        <script src="{{ asset('backend/assets/src/plugins/src/bootstrap-maxlength/custom-bs-maxlength.js') }}"></script>
        
        <script>
            $('.textareamax').maxlength({
                alwaysShow: true,
                threshold: 150,
                warningClass: "badge badge-secondary",
                limitReachedClass: "badge badge-dark",
                separator: ' of ',
                preText: 'You have ',
                postText: ' chars remaining.',
                validate: true
            });
           
        </script>
        <script type="text/javascript">
            function mainThamUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script>
            $(document).ready(function() {
                var cat = $('#mySelect').find('option:selected').val();
                console.log(cat);
                if (cat == 1) {
                    $('#social').show()
                } else {
                    $('#social').hide()
                }
                $('#mySelect').on('change', function() {
                    var selectedValue = $(this).val();

                    if (selectedValue == 1) {
                        $('#social').show()
                    } else {
                        $('#social').hide()
                    }

                });
            });
        </script>
    @stop
</x-dashboard-layout>
