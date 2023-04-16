<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function employeeAttendList()
    {
        $allData    = Attendence::orderBy('id', 'desc')->get();
        $title      = "Attendence";

        return view('backend.attendence.view_employee_attend', compact('allData', 'title'));
    }

    public function addEmployeeAttend()
    {
        $title      = "Add Employe Attendence";
        $employees   = Employee::all();

        return view('backend.attendence.add_employee_attend', compact('title', 'employees'));
    }
}
