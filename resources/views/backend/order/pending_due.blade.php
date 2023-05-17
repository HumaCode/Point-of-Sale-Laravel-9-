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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

@endpush

@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">

                    </div>
                    <h4 class="page-title"><i class="mdi mdi-account-multiple-outline me-1"></i> {{ $title }}</h4>
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
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Order Date</th>
                                    <th>Payment</th>
                                    <th>Invoice</th>
                                    <th>Total</th>
                                    <th>Pay</th>
                                    <th>Due</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($alldue as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->customer->image) }}"
                                            style="width: 50px; height: 40px;" alt="">
                                    </td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td><span class="badge bg-info">{{ $item->total }}</span></td>
                                    <td><span class="badge bg-warning">{{ round($item->pay) }}</span></td>
                                    <td><span class="badge bg-danger">{{ round($item->due) }}</span></td>
                                    <td class="text-center">
                                        <a href="{{ route('order.detail', $item->id) }}"
                                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                                class="mdi mdi-eye me-1"></i> Detail</a>

                                        <button type="button" class="btn btn-info rounded-pill waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#signup-modal" id="{{ $item->id }}"
                                            onclick="orderDue(this.id)"><i class="mdi mdi-barcode me-1"></i>
                                            Pay Due</button>
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


<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <h3> Pay Due Amount</h3>
                    </div>
                </div>

                <form class="px-3" action="{{ route('update.due') }}" method="post">
                    @csrf

                    <input type="hidden" id="order_id" name="id">
                    <input type="hidden" id="pay" name="pay">

                    <div class="mb-3">
                        <label for="due" class="form-label">Pay Now</label>
                        <input class="form-control" type="text" name="due" id="due" required="" placeholder="Due">
                    </div>




                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Update Due</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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


<script>
    function orderDue(id) {
        $.ajax({
            type: 'GET',
            url: '/order/due/'+id,
            dataType: 'json',
            success: function(data){
                console.log(data)
                $('#due').val(data.due);
                $('#pay').val(data.pay);
                $('#order_id').val(data.id);
            }
        })
    }
</script>
@endpush
@endsection