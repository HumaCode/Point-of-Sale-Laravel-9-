@extends('admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">Detail Supplier</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-eye me-1"></i> Detail Supplier</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <p class="text-danger">{{ $supplier->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <p class="text-danger">{{ $supplier->email }}</p>
                                </div>
                            </div> <!-- end col -->


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <p class="text-danger">{{ $supplier->phone }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <p class="text-danger">{{ $supplier->address }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="shopname" class="form-label">Shop Name</label>
                                    <p class="text-danger">{{ $supplier->shopname }}</p>
                                </div>
                            </div> <!-- end col -->



                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="account_holder" class="form-label">Account Holder</label>
                                    <p class="text-danger">{{ $supplier->account_holder }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <p class="text-danger">{{ $supplier->account_number }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <p class="text-danger">{{ $supplier->bank_name }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bank_branch" class="form-label">Bank Branch</label>
                                    <p class="text-danger">{{ $supplier->bank_branch }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <p class="text-danger">{{ $supplier->city }}</p>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <p class="text-danger">{{ $supplier->type }}</p>
                                </div>
                            </div> <!-- end col -->
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="photo" class="form-label"></label>
                                    <img id="showImage" src="{{ asset($supplier->image) }}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div> <!-- end col -->

                        </div> <!-- end row -->




                    </div>
                    <!-- end settings content-->

                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->

@endsection