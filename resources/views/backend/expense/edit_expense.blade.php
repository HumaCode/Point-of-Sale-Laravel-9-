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
                <h4 class="page-title"><i class="mdi mdi-pencil me-1"></i> {{ $title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('expense.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $expense->id }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="details" class="form-label">Expense Detail</label>
                                        <textarea name="details" class="form-control" id="details"
                                            rows="3">{{ $expense->details }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" name="amount" id="amount" class="form-control"
                                            value="{{ $expense->amount }}">
                                    </div>
                                </div>


                                <input type="hidden" name="date" id="date" value="{{ date('d-m-Y') }}"
                                    class="form-control">

                                <input type="hidden" name="month" id="month" value="{{ date('F') }}"
                                    class="form-control">

                                <input type="hidden" name="year" id="year" value="{{ date('Y') }}" class="form-control">


                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Update</button>
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