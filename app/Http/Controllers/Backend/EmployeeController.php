<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function allEmployee()
    {
        $employee   = Employee::latest()->get();
        $title      = "Employee";

        return view('backend.employee.all_employee', compact('employee', 'title'));
    }

    public function addEmployee()
    {
        $title      = "Add Employee";

        return view('backend.employee.add_employee', compact('title'));
    }
}
