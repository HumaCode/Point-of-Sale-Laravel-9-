@extends('admin_dashboard')

@section('admin')


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
                <h4 class="page-title"><i class="mdi mdi-plus me-1"></i> {{ $title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form id="myForm" method="post" action="{{ route('permission.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="roles" class="form-label">All Roles</label>
                                        <select name="roles" id="roles" class="form-control ">
                                            <option disabled selected>-- Select --</option>

                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="customckeck1"
                                            checked="">
                                        <label class="form-check-label" for="customckeck1">Primary</label>
                                    </div>
                                </div> <!-- end col -->

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="customckeck2"
                                            checked="">
                                        <label class="form-check-label" for="customckeck2">Primary</label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="customckeck3"
                                            checked="">
                                        <label class="form-check-label" for="customckeck3">Primary</label>
                                    </div>
                                </div>
                            </div>

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

@endsection