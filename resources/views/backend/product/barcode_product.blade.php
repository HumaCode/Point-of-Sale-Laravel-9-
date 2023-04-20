@extends('admin_dashboard')

@php
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
@endphp

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ route('all.product') }}"
                        class="btn btn-primary rounded-pill waves-effect waves-light"><i
                            class="mdi mdi-keyboard-backspace me-1"></i> Back</a>
                </div>
                <h4 class="page-title"><i class="mdi mdi-barcode-scan me-1"></i> Barcode Product</h4>
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
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Code</label>
                                    <h3>{{ $product->product_code }}</h3>

                                </div>
                            </div> <!-- end col -->



                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Barcode</label>
                                    <h3>{!! $generator->getBarcode($product->product_code, $generator::TYPE_CODE_128)
                                        !!}</h3>

                                </div>
                            </div> <!-- end col -->
                        </div>

                    </div>
                    <!-- end settings content-->

                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->

@endsection