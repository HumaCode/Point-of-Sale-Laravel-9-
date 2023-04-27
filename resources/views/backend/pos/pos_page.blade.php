@extends('admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

@push('css')
<!-- third party css -->
<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endpush


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
                <h4 class="page-title"><i class="mdi mdi-barcode me-1"></i> {{ $title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card text-center">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered border-primary mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @php
                            $allcart = Gloudemans\Shoppingcart\Facades\Cart::content();
                            @endphp

                            <tbody>

                                @foreach ($allcart as $item)

                                <tr>
                                    <td width="50">{{ $item->name }}</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" min="1" class="form-control" value="{{ $item->qty }}"
                                                style="width: 50px;">
                                            <button class="btn input-group-text btn-success waves-effect waves-light"
                                                type="button"><i class="fas fa-check"></i></button>
                                        </div>
                                    </td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->price * $item->qty }}</td>
                                    <td>
                                        <a href="" class="text-white"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->

                    <div class="bg-primary">
                        <br>
                        <p style="font-size: 18px; color:#fff;"> Quantity : 902309239</p>
                        <p style="font-size: 18px; color:#fff;"> SubTotal : 902309239</p>
                        <p style="font-size: 18px; color:#fff;"> Vat : 902309239</p>
                        <p>
                        <h2 class="text-white">Total :</h2>
                        <h1 class="text-white">902309239</h1>
                        </p>
                        <br>
                    </div>

                    <hr>

                    <form action="">

                        <label for="customer" class="form-label">All Customer</label>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mt-2">
                                    <select name="customer" id="customer" class="form-control ">
                                        <option disabled selected>-- Select --</option>

                                        @foreach ($customer as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-4 mt-">

                                <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i
                                        class="mdi mdi-plus"></i> Add Customer</button>
                            </div>
                        </div>


                        <div class="text-end">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                    class="fas fa-file-invoice-dollar"></i> Create Invoice</button>
                        </div>

                    </form>

                </div>
            </div> <!-- end card -->

        </div> <!-- end col-->

        <div class="col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($product as $key => $item)

                                <tr>
                                    <form action="{{ url('/add-cart') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="name" value="{{ $item->product_name }}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="price" value="{{ $item->selling_price }}">

                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->product_image) }}"
                                                style="width: 50px; height: 40px;" alt="">
                                        </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td class="text-center" id="tooltip-container">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill waves-effect waves-light"
                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Submit"><i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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


@push('scripts')

{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend') }}/assets/js/code.js"></script>

<!-- third party js -->
<script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
@endpush