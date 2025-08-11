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

                            <h6 class="card-title fw-bold">Edit Roles in Permission </h6>
                            <x-form.form :route="route('admin.roles.update', $role->id)" method="patch" class="forms-sample needs-validation" novalidate="novalidate" files="true">



                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Roles Name </label>
                                <h3>{{ $role->name }}</h3>

                            </div>


                            <div class="form-check mb-2">
                                <x-form.checkbox name="all_permission" id="checkDefaultmain" />
                                <x-form.input-label for="permission_all" value="Permission All" />

                            </div>

                            <hr>

                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">

                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp

                                        <div class="form-check mb-2">
                                            <x-form.checkbox
                                            name="permissions"
                                            id="checkDefaultmain"
                                            :checked="App\Models\User::roleHasPermissions($role, $permissions)"
                                        />

                                        <x-form.input-label
                                            for="checkDefaultmain"
                                            :value="$group->group_name"
                                        />
                                        </div>


                                    </div>


                                    <div class="col-9">



                                        @foreach ($permissions as $permission)
                                            <div class="form-check mb-2">
                                                <x-form.checkbox
                                                name="permission[]"
                                                :id="'checkDefault' . $permission->id"
                                                :value="$permission->id"
                                                :checked="$role->hasPermissionTo($permission->name)"
                                            />

                                            <x-form.input-label
                                                :for="'checkDefault' . $permission->id"
                                                :value="$permission->name"
                                            />

                                            </div>
                                        @endforeach
                                        <br>
                                    </div>

                                </div> <!-- // End Row  -->
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
