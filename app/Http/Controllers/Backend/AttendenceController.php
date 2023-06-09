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
        $title          = "Add Employe Attendence";
        $employees      = Employee::all();

        return view('backend.attendence.add_employee_attend', compact('title', 'employees'));
    }

    public function storeEmployeeAttend(Request $request)
    {
        Attendence::where('date', date('Y-m-d', strtotime($request->date)))->delete();

        $countemployee = count($request->employee_id);

        for ($i = 0; $i < $countemployee; $i++) {
            $attend_status  = 'attend_status' . $i;
            $attend         = new Attendence();
            $attend->date   = date('Y-m-d', strtotime($request->date));
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

    public function editEmployeeAttend($date)
    {
        $employees      = Employee::all();
        $editData       = Attendence::where('date', $date)->get();
        $title          = "Edit Employee Attendence";

        return view('backend.attendence.edit_employee_attend', compact('title', 'editData', 'employees'));
    }

    public function viewEmployeeAttend($date)
    {
        $details       = Attendence::where('date', $date)->get();
        $title         = "Detail Employee Attendence";

        return view('backend.attendence.details_employee_attend', compact('title', 'details'));
    }
}
