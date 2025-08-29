<x-dashboard-layout>
    @section('title', breadcrumb())
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('megamenu.create') }}">
            <h4 class="">Add Mega Menu</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <table id="html5-extension" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th>-</th>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Title</th>
                                    <th>Sub Menus</th>
                                    <th class="text-center">-</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($megamenus as $megamenu)
                                    <tr class="menu-{{ $megamenu->id }}">

                                        <td style="width:1%"><span class="form-check form-check-primary"><input
                                                    class="form-check-input mixed_child " value="{{ $megamenu->id }}"
                                                    type="checkbox"></span></td>
                                        <td>{{ $megamenu->id }}</td>
                                        <td>{{ $megamenu->menu->title }}</td>
                                        <td>{{ !empty($megamenu->title) ? $megamenu->title : '-' }}</td>
                                        <td>
                                          

                                            @foreach ($megamenu->linked_service_names as $name) 
                                              <div class="badge badge-dark">{{$name}}</div>
                                            @endforeach        

                                        </td>
                                        <td></td>
                                        <td class="text-center">
                                            <div class="action-btns">

                                                <a href="{{ route('megamenu.edit', $megamenu->id) }}"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                <a href="javascript:void(0)"
                                                    onClick="deleteFunction({{ $megamenu->id }},'megamenu')"
                                                    class="action-btn btn-edit bs-tooltip me-2 delete{{ $megamenu->id }}"
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
                        @if ($megamenus->count() != 0)
                            <div class="ms-3">
                                <button id="deleteall" onClick="deleteAllFunction('megamenu')"
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
    @if ($megamenus->count() != 0)
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
                    $.post("{{ route('megamenu.delete') }}", {
                        _token: crf,
                        id: checkedValues,
                        table: table
                    }, function(data) {
                        toastr.success("Selected Data Deleted");
                    });
                }
            }

            function deleteFunction(id) {

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
                            var elems = document.querySelector('.menu-' + id);
                            elems.remove();
                            var crf = '{{ csrf_token() }}';
                            $.post("{{ route('megamenu.delete') }}", {
                                _token: crf,
                                id: id,
                                table: table
                            }, function(data) {
                                toastr.success("Entry no " + id + " Deleted");
                            });


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
