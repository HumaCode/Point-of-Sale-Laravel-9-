@extends('admin_dashboard')

@section('admin')

@php
function format_uang($angka)
{
return number_format($angka, 0, ',', '.');
}
@endphp

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">Paid Salary</li>
                    </ol>
                </div>
                <h4 class="page-title"><i class="mdi mdi-cash-usd-outline me-1"></i> Paid Salary</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">


                    <div class="tab-pane" id="settings" role="tabpanel">
                        <form method="post" action="{{ route('employee.salary.store') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $paysalary->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employee_id" class="form-label"> Name</label><br>
                                        <strong class="text-white">{{ $paysalary->name }}</strong>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="month" class="form-label">Month</label><br>
                                        <strong class="text-white">{{ date("F", strtotime('-1 month')) }}</strong>
                                        <input type="hidden" name="month" value="{{ date(" F", strtotime('-1 month'))
                                            }}">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Salary</label><br>
                                        <strong class="text-white">Rp. {{ format_uang($paysalary->salary) }}</strong>
                                        <input type="hidden" name="paid_amount" value="{{ $paysalary->salary }}">
                                    </div>
                                </div> <!-- end col -->

                                @php
                                if(!empty($paysalary->advance->advance_salary)) {
                                $adv_salary =$paysalary->advance->advance_salary;
                                }else{
                                $adv_salary = 0;
                                }
                                @endphp

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Advance Salary</label><br>
                                        <strong class="text-white">{{ !empty($paysalary->advance->advance_salary) ?
                                            'Rp. '.format_uang($paysalary->advance->advance_salary) : '' }}</strong>
                                        <input type="hidden" name="advance_salary" value="{{ $adv_salary }}">
                                    </div>
                                </div> <!-- end col -->

                                @php
                                if(!empty($paysalary->advance->advance_salary)) {
                                $amount = $paysalary->salary - $paysalary->advance->advance_salary;
                                }else{
                                $amount = 0;
                                }
                                @endphp

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Due Salary</label><br>
                                        <strong class="text-white">
                                            <strong class="text-white">Rp. {{ format_uang(round($amount)) }}</strong>
                                        </strong>
                                        <input type="hidden" name="due_salary" value="{{ round($amount) }}">
                                    </div>
                                </div> <!-- end col -->


                            </div>


                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                        class="mdi mdi-content-save"></i> Paid Salary</button>
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