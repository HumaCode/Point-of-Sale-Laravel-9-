@extends('admin_dashboard')

@section('admin')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">Add Advance Salary</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-plus me-1"></i> Add Advance Salary</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employe_id" class="form-label"> Name</label>
                                        <select class="form-select @error('employe_id') is-invalid @enderror"
                                            id="employe_id" name="employe_id">
                                            <option selected disabled>-- Select --</option>

                                            @foreach ($employee as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->phone }}
                                            </option>
                                            @endforeach

                                        </select>
                                        @error('employe_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="month" class="form-label">Month</label>
                                        <select class="form-select @error('month') is-invalid @enderror" id="month"
                                            name="month">
                                            <option selected disabled>-- Select --</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="Jun">Jun</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Year</label>
                                        <select class="form-select @error('year') is-invalid @enderror" id="year"
                                            name="year">
                                            <option selected disabled>-- Select --</option>

                                            @for ($i = date('Y')-1; $i <= 2025; $i++) <option value="{{ $i }}">{{ $i }}
                                                </option>
                                                @endfor

                                        </select>
                                        @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="advance_salary" class="form-label">Advance Salary</label>
                                        <input type="text" name="advance_salary"
                                            class="form-control  @error('advance_salary') is-invalid @enderror"
                                            id="advance_salary" value="{{ old('advance_salary') }}">
                                        @error('advance_salary')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                            </div>


                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Save</button>
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