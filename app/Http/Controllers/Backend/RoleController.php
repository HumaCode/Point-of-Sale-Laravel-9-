<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allPermission()
    {
        $permissions    = Permission::all();
        $title          = "Permission";

        return view('backend.pages.permission.all_permission', compact('title', 'permissions'));
    }

    public function addPermission()
    {
        $title          = "Add Permission";

        return view('backend.pages.permission.add_permission', compact('title'));
    }

    public function storePermission(Request $request)
    {
        $role = Permission::create([
            'name'          => $request->name,
            'group_name'    => $request->group_name,
        ]);

        $notification = array(
            'message'       => 'Permission Added Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.permission')->with($notification);
    }
}
