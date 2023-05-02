@extends('admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>


<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-pencil me-1"></i> {{ $title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form id="myForm" method="post" action="{{ route('role.permission.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="role_id" class="form-label">Roles Name</label>
                                        <h4>{{ $roles->name }}</h4>

                                    </div>

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="customckeck1">
                                        <label class="form-check-label" for="customckeck1">Primary</label>
                                    </div>
                                </div> <!-- end col -->

                            </div>
                            <hr>

                            @foreach ($permission_groups as $group)

                            <div class="row">
                                <div class="col-3">

                                    @php
                                    $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                    @endphp

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="{{ $group->group_name }}" {{ App\Models\User::roleHasPermissions($roles,
                                            $permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $group->group_name }}">{{
                                            $group->group_name
                                            }}</label>
                                    </div>
                                </div>
                                <div class="col-9">



                                    @foreach ($permissions as $permission)

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" name="permission[]"
                                            value="{{ $permission->id }}" {{ $roles->hasPermissionTo($permission->name)
                                        ?
                                        'checked' : '' }} id="{{ $permission->name }}">
                                        <label class="form-check-label" for="{{ $permission->name }}">{{
                                            $permission->name
                                            }}</label>
                                    </div>

                                    @endforeach
                                    <br>

                                </div>
                            </div>

                            @endforeach


                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->

<script>
    $('#customckeck1').click(function() {
        if($(this).is(':checked')) {
            $('input[type = checkbox]').prop('checked', true);
        }else{
            $('input[type = checkbox]').prop('checked', false);
        }
    });
</script>

@endsection