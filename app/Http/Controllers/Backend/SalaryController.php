<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function addAdvanceSalary()
    {
        $employee   = Employee::latest()->get();
        $title      = "Advance Salary";

        return view('backend.salary.add_advance_salary', compact('employee', 'title'));
    }
}
