<x-main-layout>
    @section('title', breadcrumb())

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title fw-bold">Add Roles in Permission </h6>
                            <x-form.form :route="route('role.permission.store')" method="post" class="forms-sample" id="myForm">
                                <div class="form-group mb-3">
                                    <x-form.input-label for="exampleFormControlSelect1" value="Roles Name" />
                                    <select name="role_id" id="exampleFormControlSelect1" class="form-select">
                                        <option value="">-- Select Role --</option>
                                        @foreach($roles as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check mb-2">
                                    <x-form.checkbox name="all_permission" id="checkDefaultmain" />
                                    <x-form.input-label for="checkDefaultmain" value="Permission All" />
                                </div>

                                <hr>

                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <x-form.checkbox
                                                    name="permissions"
                                                    :id="'group_' . Str::slug($group->group_name)"
                                                />
                                                <x-form.input-label
                                                    :for="'group_' . Str::slug($group->group_name)"
                                                    :value="$group->group_name"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp

                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <x-form.checkbox
                                                        name="permission[]"
                                                        :id="'permission_' . $permission->id"
                                                        :value="$permission->id"
                                                    />
                                                    <x-form.input-label
                                                        :for="'permission_' . $permission->id"
                                                        :value="$permission->name"
                                                    />
                                                </div>
                                            @endforeach
                                            <br>
                                        </div>
                                    </div> <!-- End Row -->
                                @endforeach

                                <x-form.button>Submit</x-form.button>
                            </x-form.form>



                        </div>
                    </div>




                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {

            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }

        });
    </script>
</x-main-layout>
