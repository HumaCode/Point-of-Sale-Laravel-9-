@extends('admin_dashboard')


@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">


                        <a href="{{ route('add.roles.permission') }}"
                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-plus me-1"></i> Add {{ $title }}</a>

                    </div>
                    <h4 class="page-title"><i class="mdi mdi-account-multiple-outline me-1"></i> All {{ $title }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <table class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="100">Roles Name</th>
                                    <th width="500">Permission</th>
                                    <th width="250" class="text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($roles as $key => $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>

                                        @foreach ($item->permissions as $perm)
                                        <span class="badge rounded-pill bg-danger">{{ $perm->name }}</span>
                                        @endforeach

                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.edit.roles', $item->id) }}"
                                            class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                                class="mdi mdi-pencil me-1"></i> Edit</a> &nbsp;
                                        <a href="{{ route('delete.permission', $item->id) }}"
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




@endsection