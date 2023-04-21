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

                        <a href="{{ route('export') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                class="mdi mdi-download me-1"></i> Download XLSX</a>


                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-file-import-outline me-1"></i> {{ $title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('import') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="import_file" class="form-label">XLSX File Import</label>
                                        <input type="file" class="form-control" name="import_file" id="import_file"
                                            accept=".xlsx,.xls">

                                    </div>
                                </div>


                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Upload</button>
                                </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->






@endsection