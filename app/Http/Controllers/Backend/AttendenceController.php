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
        $allData    = Attendence::select('date')->groupBy('date')->orderBy('id', 'desc')->get();
        $title      = "Attendence";

        return view('backend.attendence.view_employee_attend', compact('allData', 'title'));
    }

    public function addEmployeeAttend()
    {
        $title      = "Add Employe Attendence";
        $employees   = Employee::all();

        return view('backend.attendence.add_employee_attend', compact('title', 'employees'));
    }

    public function storeEmployeeAttend(Request $request)
    {
        $countemployee = count($request->employee_id);

        for ($i = 0; $i < $countemployee; $i++) {
            $attend_status = 'attend_status' . $i;
            $attend = new Attendence();
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        $notification = array(
            'message'       => 'Data Inserted Successfully',
            'alert-type'    => 'success',
        );

        return redirect()->route('employee.attend.list')->with($notification);
    }
}
