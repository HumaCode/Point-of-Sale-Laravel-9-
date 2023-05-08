<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

    public function changePassword()
    {
        $title = "Change Password";

        return view('admin.change_password', compact('title'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // cek old password
        if (!Hash::check($request->old_password, auth::user()->password)) {


            $notification = array(
                'message'       => 'Old Password Does Not Match!!',
                'alert-type'    => 'error',
            );

            return back()->with($notification);
        }

        // update new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message'       => 'Password Change Successfully',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    /////////////////// Admin User All /////////////////////////

    public function allAdmin()
    {
        $alladmin = User::latest()->get();
        $title    = "All Admin";

        return view('backend.admin.all_admin', compact('alladmin', 'title'));
    }

    public function addAdmin()
    {
        $roles = Role::all();
        $title = "Add Admin";

        return view('backend.admin.add_admin', compact('roles', 'title'));
    }

    public function adminStore(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message'       => 'New User Admin created successfully',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function editAdmin($id)
    {
        $roles      = Role::all();
        $adminuser  = User::findOrFail($id);
        $title      = "Edit Admin Role";

        return view('backend.admin.edit_admin', compact('roles', 'title', 'adminuser'));
    }

    public function updateAdmin(Request $request)
    {
        $admin_id = $request->id;

        $user = User::findOrFail($admin_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();


        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message'       => 'Admin User updated successfully',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function deleteAdmin($id)
    {
        $user        = User::findOrFail($id);

        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message'       => 'Admin User deleted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
