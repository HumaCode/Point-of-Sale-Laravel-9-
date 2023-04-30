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
                        <form method="post" action="{{ route('order.status.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $order->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label> &nbsp; &nbsp;
                                        <img id="showImage" src="{{ asset($order->customer->image) }}"
                                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <p class="text-danger">{{ $order->customer->name }}</p>
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <p class="text-danger">{{ $order->customer->email }}</p>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <p class="text-danger">{{ $order->customer->phone }}</p>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Order Date</label>
                                        <p class="text-danger">{{ $order->order_date }}</p>
                                    </div>
                                </div> <!-- end col -->



                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Payment Status</label>
                                        <p class="text-danger">{{ $order->payment_status }}</p>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Paid Amount</label>
                                        <p class="text-danger">{{ $order->pay }}</p>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Due Amount</label>
                                        <p class="text-danger">{{ $order->due }}</p>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <p class="text-danger">{{ $order->customer->name }}</p>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Order Invoice</label>
                                        <p class="text-danger">{{ $order->invoice_no }}</p>
                                    </div>
                                </div> <!-- end col -->


                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Complete Order</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <table class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total (+vat)</th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($orderItem as $item)

                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->product->product_image) }}"
                                                    style="width: 50px; height: 40px;" alt="">
                                            </td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->product->product_code }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product->selling_price }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td><span class="badge bg-danger">{{ $item->order_status }}</span></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->

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