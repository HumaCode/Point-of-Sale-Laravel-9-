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
                                        <a href="{{ route('admin.delete.roles', $item->id) }}"
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

@push('scripts')
{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Delete This Roles?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "This roles has been deleted.", "success");
            }
        });
    });
});
</script>

@endpush