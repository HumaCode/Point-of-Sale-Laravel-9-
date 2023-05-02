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
        Permission::create([
            'name'          => $request->name,
            'group_name'    => $request->group_name,
        ]);

        $notification = array(
            'message'       => 'Permission Added Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $title      = "Edit Permission";

        return view('backend.pages.permission.edit_permission', compact('title', 'permission'));
    }

    public function updatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name'          => $request->name,
            'group_name'    => $request->group_name,
        ]);

        $notification = array(
            'message'       => 'Permission Updated Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function deletePermission($id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Permission Deleted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.permission')->with($notification);
    }



    /////////////////////////// -- Role -- /////////////////////

    public function allRoles()
    {
        $roles          = Role::all();
        $title          = "Roles";

        return view('backend.pages.roles.all_roles', compact('title', 'roles'));
    }

    public function addRoles()
    {
        $title          = "Add Roles";

        return view('backend.pages.roles.add_roles', compact('title'));
    }

    public function storeRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message'       => 'Roles Added Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.roles')->with($notification);
    }
}
