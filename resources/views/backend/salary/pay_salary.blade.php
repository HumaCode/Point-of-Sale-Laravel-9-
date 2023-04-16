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


                        <a href="{{ route('add.advance.salary') }}"
                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-plus me-1"></i> Pay Salary</a>

                    </div>
                    <h4 class="page-title"><i class="mdi mdi-cash-usd-outline me-1"></i> All Pay Salary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">{{ date("F Y") }}</h4>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Advance</th>
                                    <th>Due</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($employee as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" style="width: 50px; height: 40px;" alt="">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td><span class="badge bg-info">{{ date("F", strtotime('-1 month')) }}</span>
                                    </td>
                                    <td>Rp. {{ format_uang($item->salary) }}</td>
                                    <td>


                                        @if(empty($item->advance->advance_salary) )
                                        <p>No Advance</p>
                                        @else
                                        Rp. {{ format_uang($item->advance->advance_salary) }}
                                        @endif

                                    </td>
                                    <td>
                                        @php
                                        if(!empty($item->advance->advance_salary)) {
                                        $amount = $item->salary - $item->advance->advance_salary;
                                        }else{
                                        $amount = 0;
                                        }
                                        @endphp

                                        <strong class="text-white">Rp. {{ format_uang(round($amount)) }}</strong>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('edit.advance.salary', $item->id) }}"
                                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                                class="mdi mdi-cash-usd-outline me-1"></i> Pay Now</a> &nbsp;

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