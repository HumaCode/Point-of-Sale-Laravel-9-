@extends('admin_dashboard')

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

@php
function format_uang($angka)
{
return number_format($angka, 0, ',', '.');
}
@endphp

@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">


                        <a href="{{ route('add.product') }}"
                            class="btn btn-info rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-file-import-outline me-1"></i> Import</a>
                        <a href="{{ route('add.product') }}"
                            class="btn btn-danger rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-file-export-outline me-1"></i> Export</a>
                        <a href="{{ route('add.product') }}"
                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-plus me-1"></i> Add Product</a>

                    </div>
                    <h4 class="page-title"><i class="mdi mdi-account-multiple-outline me-1"></i> All Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($product as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->product_image) }}" style="width: 50px; height: 40px;"
                                            alt="">
                                    </td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ $item->supplier->name }}</td>
                                    <td>{{ $item->product_code }}</td>
                                    <td>Rp. {{ format_uang($item->selling_price) }}</td>
                                    <td class="text-center " id="tooltip-container">
                                        <a href="{{ route('edit.product', $item->id) }}"
                                            class="btn btn-primary rounded-pill waves-effect waves-light"
                                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Edit"><i class="fas fa-pencil-alt"></i>
                                        </a> &nbsp;
                                        <a href="{{ route('barcode.product', $item->id) }}"
                                            class="btn btn-info rounded-pill waves-effect waves-light"
                                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Product Barcode"><i
                                                class="fas fa-barcode"></i></a> &nbsp;
                                        <a href="{{ route('delete.product', $item->id) }}"
                                            class="btn btn-danger rounded-pill waves-effect waves-light"
                                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Delete" id="delete"><i
                                                class="fas fa-trash-alt "></i>
                                        </a>
                                    </td>
                                </tr><i @endforeach </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>
</div>



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
@endsection