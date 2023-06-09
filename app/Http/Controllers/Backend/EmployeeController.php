<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function storeEmployee(Request $request)
    {
        $validateData = $request->validate(
            [
                'name'          => 'required|max:200',
                'email'         => 'required|unique:employees|max:200',
                'phone'         => 'required|max:200',
                'address'       => 'required|max:200',
                'experience'    => 'required',
                'salary'        => 'required|max:200',
                'vacation'      => 'required|max:200',
                'city'          => 'required|max:200',
                'image'         => 'required',
            ],
            [
                'name.required' => 'This Employee Name Field  is Required',
            ]
        );

        $image      = $request->file('image');
        $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/employee/' . $name_gen);
        $save_url   = 'upload/employee/' . $name_gen;

        Employee::insert([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'experience'    => $request->experience,
            'salary'        => $request->salary,
            'vacation'      => $request->vacation,
            'city'          => $request->city,
            'image'         => $save_url,
            'created_at'    => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Employee Inserted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.employee')->with($notification);
    }

    public function editEmployee($id)
    {
        $employee   = Employee::findOrFail($id);
        $title      = "Edit Employee";

        return view('backend.employee.edit_employee', compact('title', 'employee'));
    }

    public function updateEmployee(Request $request)
    {
        $employe_id = $request->id;
        $employee   = Employee::findOrFail($employe_id);
        $old_image = substr($employee->image, -20);


        $validateData = $request->validate(
            [
                'name'          => 'required|max:200',
                'email'         => 'required|max:200',
                'phone'         => 'required|max:200',
                'address'       => 'required|max:200',
                'experience'    => 'required',
                'salary'        => 'required|max:200',
                'vacation'      => 'required|max:200',
                'city'          => 'required|max:200',
            ],
            [
                'name.required' => 'This Employee Name Field  is Required',
            ]
        );

        if ($request->file('image')) {

            if ($old_image != null) {
                unlink('upload/employee/' . $old_image);
            }

            $image      = $request->file('image');
            $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/employee/' . $name_gen);
            $save_url   = 'upload/employee/' . $name_gen;

            Employee::findOrFail($employe_id)->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'experience'    => $request->experience,
                'salary'        => $request->salary,
                'vacation'      => $request->vacation,
                'city'          => $request->city,
                'image'         => $save_url,
                'created_at'    => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Employee Updated Successfull',
                'alert-type'    => 'success',
            );
        } else {
            Employee::findOrFail($employe_id)->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'experience'    => $request->experience,
                'salary'        => $request->salary,
                'vacation'      => $request->vacation,
                'city'          => $request->city,
                'created_at'    => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Employee Updated Successfull',
                'alert-type'    => 'success',
            );
        }
        return redirect()->route('all.employee')->with($notification);
    }

    public function deleteEmployee($id)
    {
        $employe_img    = Employee::findOrFail($id);
        $img            = $employe_img->image;
        unlink($img);

        Employee::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Employee Deleted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
