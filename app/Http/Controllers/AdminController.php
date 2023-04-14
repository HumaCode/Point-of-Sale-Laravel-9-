<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message'       => 'Admin Logout Successfully',
            'alert-type'    => 'info',
        );

        return redirect('/logout')->with($notification);
    }

    public function adminLogoutPage()
    {
        $title = "Logout Success";

        return view('admin.admin_logout', compact('title'));
    }

    public function adminProfile()
    {
        $id         = Auth::user()->id;
        $adminData  = User::find($id);
        $title      = "Profile Page";

        return view('admin.admin_profile_view', compact('adminData', 'title'));
    }

    public function adminProfileStore(Request $request)
    {
        $id             = Auth::user()->id;
        $data           = User::find($id);
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $old_image      = $data->photo;


        if ($request->file('photo')) {
            if ($old_image != null) {
                unlink('upload/admin_image/' . $old_image);
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . '-' . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message'       => 'Admin Profile Updated Successfully',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
