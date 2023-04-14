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
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-plus me-1"></i> Add Employee</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Employee Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Employee Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Employee Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control  @error('phone') is-invalid @enderror" id="phone">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Employee Address</label>
                                        <input type="text" name="address"
                                            class="form-control  @error('address') is-invalid @enderror" id="address">
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="experience" class="form-label">Employee Experience</label>
                                        <select class="form-select @error('experience') is-invalid @enderror"
                                            id="experience" name="experience">
                                            <option selected disabled>-- Select --</option>
                                            <option value="1 Year">1 Year</option>
                                            <option value="2 Year">2 Year</option>
                                            <option value="3 Year">3 Year</option>
                                            <option value="4 Year">4 Year</option>
                                            <option value="5 Year">5 Year</option>
                                        </select>
                                        @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Employee Salary</label>
                                        <input type="text" name="salary"
                                            class="form-control  @error('salary') is-invalid @enderror" id="salary">
                                        @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="vocation" class="form-label">Employee Vocation</label>
                                        <input type="text" name="vocation"
                                            class="form-control  @error('vocation') is-invalid @enderror" id="vocation">
                                        @error('vocation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Employee City</label>
                                        <input type="text" name="city"
                                            class="form-control  @error('city') is-invalid @enderror" id="city">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Profile Image</label>
                                        <input type="file" name="photo" id="image" class="form-control">
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="photo" class="form-label"></label>
                                        <img id="showImage" src="{{ url('upload/noimage.png') }}"
                                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                </div> <!-- end col -->

                            </div> <!-- end row -->



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
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>



@endsection