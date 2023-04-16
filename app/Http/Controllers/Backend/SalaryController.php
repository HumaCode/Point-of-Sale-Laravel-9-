<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function allAdvanceSalary()
    {
        $salary = AdvanceSalary::latest()->get();
        $title  = "All Advance Salary";

        return view('backend.salary.all_advance_salary', compact('salary', 'title'));
    }


    public function addAdvanceSalary()
    {
        $employee   = Employee::latest()->get();
        $title      = "Advance Salary";

        return view('backend.salary.add_advance_salary', compact('employee', 'title'));
    }

    public function storeAdvanceSalary(Request $request)
    {
        $validateData = $request->validate([
            'employee_id'       => 'required',
            'month'             => 'required',
            'year'              => 'required',
            'advance_salary'    => 'required|max:255',
        ]);

        $employee_id = $request->employee_id;
        $month = $request->month;

        $advanced = AdvanceSalary::where('month', $month)->where('employee_id', $employee_id)->first();

        if ($advanced === null) {
            AdvanceSalary::insert([
                'employee_id'       => $request->employee_id,
                'month'             => $request->month,
                'year'              => $request->year,
                'advance_salary'    => $request->advance_salary,
                'created_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Advance Salary Paid Successfull',
                'alert-type'    => 'success',
            );
        } else {
            $notification = array(
                'message'       => 'Advance Salary Already Paid',
                'alert-type'    => 'warning',
            );
        }
        return redirect()->back()->with($notification);
    }
}
