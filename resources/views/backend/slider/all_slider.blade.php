<x-dashboard-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('slider.create') }}">
            <h4 class="">Add Slider</h4>
        </a>
    </div>
    <div class="page-content">


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">All Slider</h6>

                        <div class="table-responsive">
                            <table id="html5-extension" class="table dt-table-hover">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th> 
                                        <th>Style</th>                                           
                                        <th>Status</th>                                        
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $slide)
                                        <tr class="slider-{{ $slide->id }}">
                                            <td style="width:1%"><span class="form-check form-check-primary"><input
                                                        class="form-check-input mixed_child "
                                                        value="{{ $slide->id }}" type="checkbox"></span></td>
                                            <td>{{ $slide->id }}</td>
                                            <td>@php
                                                if (!empty($slide->image)) {
                                                    $img = explode('.', $slide->image);
                                                    $small_img = $img[0] . '_thumb.' . $img[1];
                                                } else {
                                                    $small_img = '/upload/no_image.jpg'; # code...
                                                }
                                            @endphp
                                                <img src="{{ asset($small_img) }}"
                                                    class="img-thumbnail img-fluid img-responsive w-10">
                                            </td>
                                           
                                            <td><span class="shadow-none badge badge-light-{{BADGE[$slide->style]}}">{{ SLIDER_STYLE[$slide->style] }}</span></td>
                                            <td>{{ $slide->name }}</td>
                                            <td class="text-center">
                                                <button type="button" onClick="statusFunction( {{$slide->id}} ,'Slider')"
                                                    class="shadow-none badge badge-light-{{ $slide->status == 1 ? 'danger' : 'success' }} warning changestatus{{ $slide->id }}  bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title="Status"
                                                    data-original-title="Status">{{ $slide->status == 1 ? 'Deactive' : 'Active' }}</button>
        
                                            </td>
                                           
                                            <td class="text-center">
                                                <div class="action-btns">
                                                    <a href="{{ route('slider.edit', $slide->id) }}"
                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        data-bs-original-title="Edit">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        onClick="deleteFunction({{ $slide->id }},'Slider')"
                                                        class="action-btn btn-edit bs-tooltip me-2 delete{{ $slide->id }}"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"
                                                        data-bs-original-title="Delete">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                    </form>
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($slider->count() != 0)
                                <div class="ms-3">
                                    <button id="deleteall" onClick="deleteAllFunction('slider')"
                                        class="btn btn-danger mb-2 me-4">
                                        <span class="btn-text-inner">Delete Selected</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if ($slider->count() != 0)
        <script type="text/javascript">
            function deleteAllFunction(table) {
                // Get all checkboxes with the specified class name
                var checkboxes = document.querySelectorAll('.mixed_child');
                // Initialize an array to store checked checkbox values
                var checkedValues = [];
                // Iterate through each checkbox
                checkboxes.forEach(function(checkbox) {
                    // Check if the checkbox is checked
                    if (checkbox.checked) {
                        // Add the value to the array
                        checkedValues.push(checkbox.value);
                    }
                });
                if (checkedValues.length === 0) {
                    // Display an alert if none are checked               
                    toastr.warning("Please check at least one checkbox.");
                } else {
                    // Output the array to the console (you can do whatever you want with the array)
                    checkboxes.forEach(function(checkbox) {
                        // Check if the checkbox is checked
                        if (checkbox.checked) {
                            // Add the value to the array
                            checkedValues.push(checkbox.value);
                            var elems = document.querySelector('.social-' + checkbox.value);
                            elems.remove();
                        }
                    });
                    // console.log("Checked Checkbox Values: ", checkedValues);
                    var crf = '{{ csrf_token() }}';
                    $.post("{{ route('slider.delete') }}", {
                        _token: crf,
                        id: checkedValues,
                        table: table,                       
                    }, function(data) {
                        toastr.success("Selected Data Deleted");
                    });
                }
            }

            function statusFunction(id, table) {
                // event.preventDefault(); // prevent form submit
                // var form = event.target.form; // storing the form
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                document.querySelector('.warning.changestatus' + id).addEventListener('click', function() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to change the status!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Change it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire(
                                'Changed!',
                                'Your status has been changed.',
                                'success'
                            )
                            setTimeout(function() {
                                var crf = '{{ csrf_token() }}';
                                $.post("{{ route('slider.status') }}", {
                                    _token: crf,
                                    id: id,
                                    table: table
                                }, function(data) {
                                    var elems = document.querySelector('.warning.changestatus' +
                                        id);
                                    if (data == 'active') {
                                        elems.classList.remove("badge-light-danger");
                                        elems.classList.add("badge-light-success");
                                        elems.innerText = 'Active';
                                        toastr.success("Status Active");
                                    } else {
                                        elems.classList.remove("badge-light-success");
                                        elems.classList.add("badge-light-danger");
                                        elems.innerText = 'Deactive';
                                        toastr.warning(" Status Deactived");
                                    }

                                });

                            }, 1000);
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your status is not Changed :)',
                                'error'
                            )
                        }
                    })
                })

            }

            function deleteFunction(id, table) {

                // event.preventDefault(); // prevent form submit
                // var form = event.target.form; // storing the form
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                document.querySelector('.delete' + id).addEventListener('click', function() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            setTimeout(function() {
                                var elems = document.querySelector('.slider-' + id);
                                elems.remove();
                                var crf = '{{ csrf_token() }}';
                                $.post("{{ route('slider.delete') }}", {
                                    _token: crf,
                                    id: id,
                                    table: table,                                   
                                }, function(data) {
                                    toastr.success("Entry no " + id + " Deleted");
                                });

                            }, 1000);
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your data is safe :)',
                                'error'
                            )
                        }
                    })
                })
            }
        </script>
    @endif
</x-dashboard-layout>
