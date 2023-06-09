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
                        <li class="breadcrumb-item active">Edit Advance Salary</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-pencil me-1"></i> Edit Advance Salary</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('advance.salary.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $salary->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employee_id" class="form-label"> Name</label>
                                        <select class="form-select @error('employee_id') is-invalid @enderror"
                                            id="employee_id" name="employee_id">
                                            <option selected disabled>-- Select --</option>

                                            @foreach ($employee as $item)

                                            @if ($salary->employee_id == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }} - Rp. {{
                                                $item->salary }}
                                            </option>
                                            @else
                                            <option value="{{ $item->id }}">{{ $item->name }} - Rp. {{
                                                $item->salary }}
                                            </option>
                                            @endif

                                            @endforeach

                                        </select>
                                        @error('employee_id')
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
                                            <option value="January" {{ $salary->month == 'January' ? 'selected' : ''
                                                }}>January</option>
                                            <option value="February" {{ $salary->month == 'February' ? 'selected' : ''
                                                }}>February</option>
                                            <option value="March" {{ $salary->month == 'March' ? 'selected' : ''
                                                }}>March</option>
                                            <option value="April" {{ $salary->month == 'April' ? 'selected' : ''
                                                }}>April</option>
                                            <option value="May" {{ $salary->month == 'May' ? 'selected' : '' }}>May
                                            </option>
                                            <option value="Jun" {{ $salary->month == 'Jun' ? 'selected' : '' }}>Jun
                                            </option>
                                            <option value="July" {{ $salary->month == 'July' ? 'selected' : '' }}>July
                                            </option>
                                            <option value="August" {{ $salary->month == 'August' ? 'selected' : ''
                                                }}>August</option>
                                            <option value="September" {{ $salary->month == 'September' ? 'selected' : ''
                                                }}>September</option>
                                            <option value="November" {{ $salary->month == 'November' ? 'selected' : ''
                                                }}>November</option>
                                            <option value="December" {{ $salary->month == 'December' ? 'selected' : ''
                                                }}>December</option>
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

                                            @for ($i = date('Y')-1; $i <= 2025; $i++) @if ($salary->year == $i)

                                                <option value="{{ $i }}" selected>{{ $i }}</option>
                                                @else
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endif

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
                                            id="advance_salary"
                                            value="{{ old('advance_salary', $salary->advance_salary) }}">
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