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
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-pencil me-1"></i> Edit Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form id="myForm" method="post" action="{{ route('product.update') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="product_name" id="product_name"
                                            value="{{ old('product_name', $product->product_name) }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control ">
                                            <option disabled selected>-- Select --</option>

                                            @foreach ($category as $item)
                                            @if ($item->id == $product->category_id)
                                            <option value="{{ $item->id }}" selected>{{ $item->category_name }}</option>
                                            @else
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endif
                                            @endforeach

                                        </select>

                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="supplier_id" class="form-label">Supplier</label>
                                        <select name="supplier_id" id="supplier_id" class="form-control ">
                                            <option disabled selected>-- Select --</option>

                                            @foreach ($supplier as $sup)
                                            @if ($sup->id == $product->supplier_id)
                                            <option value="{{ $sup->id }}" selected>{{ $sup->name }} -- {{ $sup->type }}
                                            </option>
                                            @else
                                            <option value="{{ $sup->id }}">{{ $sup->name }} -- {{ $sup->type }}
                                            </option>
                                            @endif
                                            @endforeach

                                        </select>

                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product_code" class="form-label">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" id="product_code"
                                            value="{{ old('product_code', $product->product_code) }}" readonly>

                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product_garage" class="form-label">Product Garage</label>
                                        <input type="text" name="product_garage" class="form-control  "
                                            id="product_garage"
                                            value="{{ old('product_garage', $product->product_garage) }}">

                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product_store" class="form-label">Product Store</label>
                                        <input type="text" name="product_store" class="form-control " id="product_store"
                                            value="{{ old('product_store', $product->product_store) }}">

                                    </div>
                                </div> <!-- end col -->



                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="buying_date" class="form-label">Buying Date</label>
                                        <input type="date" name="buying_date" class="form-control " id="buying_date"
                                            value="{{ old('buying_date', $product->buying_date) }}">

                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="expire_date" class="form-label">Expire Date</label>
                                        <input type="date" name="expire_date" class="form-control  " id="expire_date"
                                            value="{{ old('expire_date', $product->expire_date) }}">

                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="buying_price" class="form-label">Buying Price</label>
                                        <input type="text" name="buying_price" class="form-control " id="buying_price"
                                            value="{{ old('buying_price', $product->buying_price) }}">

                                    </div>
                                </div> <!-- end col -->



                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="selling_price" class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control  "
                                            id="selling_price"
                                            value="{{ old('selling_price', $product->selling_price) }}">

                                    </div>
                                </div> <!-- end col -->
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="product_image" class="form-label">Image</label>
                                        <input type="file" name="product_image" id="product_image"
                                            class="form-control ">

                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="photo" class="form-label"></label>
                                        <img id="showImage" src="{{ asset($product->product_image) }}"
                                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                </div> <!-- end col -->

                            </div> <!-- end row -->



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
                product_name: {
                    required : true,
                },  
                category_id: {
                    required : true,
                },  
                supplier_id: {
                    required : true,
                },  
                product_code: {
                    required : true,
                },  
                product_garage: {
                    required : true,
                },  
                product_store: {
                    required : true,
                },  
                buying_price: {
                    required : true,
                },  
                expire_date: {
                    required : true,
                },  
                selling_price: {
                    required : true,
                },  
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                }, 
                category_id: {
                    required : 'Please Select Category',
                }, 
                supplier_id: {
                    required : 'Please Select Supplier',
                }, 
                product_code: {
                    required : 'Please Enter Product Code',
                }, 
                product_garage: {
                    required : 'Please Enter Product Garage',
                }, 
                product_store: {
                    required : 'Please Enter Product Store',
                }, 
                buying_price: {
                    required : 'Please Select Buying Price',
                }, 
                expire_date: {
                    required : 'Please Select Expire Date',
                }, 
                selling_price: {
                    required : 'Please Enter Selling Price',
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
@endpush