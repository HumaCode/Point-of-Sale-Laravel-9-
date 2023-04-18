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
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-plus me-1"></i> Add Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Name</label>
                                        <input type="text"
                                            class="form-control @error('product_name') is-invalid @enderror"
                                            name="product_name" id="product_name" value="{{ old('product_name') }}">
                                        @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option disabled selected>-- Select --</option>

                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="supplier_id" class="form-label">Supplier</label>
                                        <select name="supplier_id" id="supplier_id"
                                            class="form-control @error('supplier_id') is-invalid @enderror">
                                            <option disabled selected>-- Select --</option>

                                            @foreach ($supplier as $sup)
                                            <option value="{{ $sup->id }}">{{ $sup->name }} -- {{ $sup->type }}
                                            </option>
                                            @endforeach

                                        </select>
                                        @error('supplier_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="product_code" class="form-label">Product Code</label>
                                        <input type="text" name="product_code"
                                            class="form-control  @error('product_code') is-invalid @enderror"
                                            id="product_code" value="{{ old('product_code') }}">
                                        @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="product_garage" class="form-label">Product Garage</label>
                                        <input type="text" name="product_garage"
                                            class="form-control  @error('product_garage') is-invalid @enderror"
                                            id="product_garage" value="{{ old('product_garage') }}">
                                        @error('product_garage')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="product_store" class="form-label">Product Store</label>
                                        <input type="text" name="product_store"
                                            class="form-control  @error('product_store') is-invalid @enderror"
                                            id="product_store" value="{{ old('product_store') }}">
                                        @error('product_store')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->



                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="buying_date" class="form-label">Buying Date</label>
                                        <input type="date" name="buying_date"
                                            class="form-control  @error('buying_date') is-invalid @enderror"
                                            id="buying_date" value="{{ old('buying_date') }}">
                                        @error('buying_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="expire_date" class="form-label">Expire Date</label>
                                        <input type="date" name="expire_date"
                                            class="form-control  @error('expire_date') is-invalid @enderror"
                                            id="expire_date" value="{{ old('expire_date') }}">
                                        @error('expire_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="buying_price" class="form-label">Buying Price</label>
                                        <input type="text" name="buying_price"
                                            class="form-control  @error('buying_price') is-invalid @enderror"
                                            id="buying_price" value="{{ old('buying_price') }}">
                                        @error('buying_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->



                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="selling_price" class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price"
                                            class="form-control  @error('selling_price') is-invalid @enderror"
                                            id="selling_price" value="{{ old('selling_price') }}">
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="product_image" class="form-label">Image</label>
                                        <input type="file" name="product_image" id="product_image"
                                            class="form-control @error('product_image') is-invalid @enderror">
                                        @error('product_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
        $('#product_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>



@endsection