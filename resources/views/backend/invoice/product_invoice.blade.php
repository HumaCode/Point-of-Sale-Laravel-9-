@extends('admin_dashboard')


@php
function format_uang($angka)
{
return number_format($angka, 0, ',', '.');
}
@endphp

@section('admin')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Poin Of Sale</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <div class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt=""
                                            height="22">
                                    </span>
                                </div>

                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend') }}/assets/images/logo-light.png" alt=""
                                            height="22">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, {{ $customer->name }}</b></p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p><strong>Order Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; Jan
                                        17, 2016</span></p>
                                <p><strong>Order Status : </strong> <span class="float-end"><span
                                            class="badge bg-danger">Unpaid</span></span></p>
                                <p><strong>Invoice No. : </strong> <span class="float-end">000028 </span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>Billing Address</h6>
                            <address>
                                {{ $customer->address }} - {{ $customer->city }}
                                <br>
                                <abbr title="Shop Name">Shop Name:</abbr> {{ $customer->shopname }} <br>
                                <abbr title="Phone">Phone:</abbr> {{ $customer->phone }} <br>
                                <abbr title="Email">Email:</abbr> {{ $customer->email }} <br>
                            </address>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th style="width: 10%">QTY</th>
                                            <th style="width: 10%">Unit Cost</th>
                                            <th style="width: 10%" class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                        $i =1;
                                        @endphp
                                        @foreach ($contents as $key => $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <b>{{ $item->name }}</b> <br>
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp. {{ format_uang($item->price) }}</td>
                                            <td class="text-end">Rp. {{ format_uang($item->price * $item->qty) }}</td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Notes:</h6>

                                <small class="text-muted">
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p><b>Sub-total : </b> <span class="float-end"> Rp. {{ Cart::subtotal() }}</span></p>
                                <p><b>Vat (21%) : </b> <span class="float-end"> &nbsp;&nbsp;&nbsp; Rp. {{ Cart::tax()
                                        }}</span></p>
                                <h3>Rp. {{ Cart::total() }}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                            <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>

@endsection