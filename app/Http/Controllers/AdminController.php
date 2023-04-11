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

        return redirect('/logout');
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
}
