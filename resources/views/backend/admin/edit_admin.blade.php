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
                        <form id="myForm" method="post" action="{{ route('admin.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $adminuser->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $adminuser->name) }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email', $adminuser->email) }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ old('phone', $adminuser->phone) }}">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="roles" class="form-label">Asign Roles</label>
                                        <select name="roles" id="roles" class="form-control ">
                                            <option disabled selected>-- Select --</option>

                                            @foreach ($roles as $role)
                                            @if ($role->name == $adminuser->hasRole($role->name))

                                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                            @else
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>

                                            @endif
                                            @endforeach

                                        </select>

                                    </div>
                                </div> <!-- end col -->

                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Update</button>
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


@push('scripts')
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },  
                email: {
                    required : true,
                },  
                phone: {
                    required : true,
                },  
                password: {
                    required : true,
                },  
                roles: {
                    required : true,
                },  
                photo: {
                    required : true,
                },  
            },
            messages :{
                name: {
                    required : 'Please Enter Name',
                }, 
                email: {
                    required : 'Please Enter Email',
                }, 
                phone: {
                    required : 'Please Enter Phone',
                }, 
                password: {
                    required : 'Please Enter Password',
                }, 
                roles: {
                    required : 'Please Select Roles',
                }, 
                photo: {
                    required : 'Please Select Photo',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endpush