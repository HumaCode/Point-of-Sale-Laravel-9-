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

@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">


                        <a href="{{ route('add.admin') }}"
                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-plus me-1"></i> Add Admin</a>

                    </div>
                    <h4 class="page-title"><i class="mdi mdi-account-multiple-outline me-1"></i> {{ $title }} &nbsp;
                        <span class="badge bg-danger"> {{ count($alladmin) }}</span>
                    </h4>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($alladmin as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ (!empty($item->photo)) ? url('upload/admin_image/' . $item->photo) : url('upload/noimage.png') }}"
                                            style="width: 50px; height: 40px;" alt="">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @foreach ($item->roles as $role)
                                        <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('edit.customer', $item->id) }}"
                                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                                class="mdi mdi-pencil me-1"></i> Edit</a> &nbsp;
                                        <a href="{{ route('delete.customer', $item->id) }}"
                                            class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i
                                                class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
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