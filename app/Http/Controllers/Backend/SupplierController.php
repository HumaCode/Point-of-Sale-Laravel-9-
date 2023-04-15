<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    public function allSupplier()
    {
        $supplier   = Supplier::latest()->get();
        $title      = "Supplier";

        return view('backend.supplier.all_supplier', compact('supplier', 'title'));
    }

    public function addSupplier()
    {
        $title      = "Add Supplier";

        return view('backend.supplier.add_supplier', compact('title'));
    }

    public function storeSupplier(Request $request)
    {
        $validateData = $request->validate(
            [
                'name'              => 'required|max:200',
                'email'             => 'required|unique:suppliers|max:200',
                'phone'             => 'required|max:200',
                'address'           => 'required',
                'shopname'          => 'required',
                'account_holder'    => 'required|max:200',
                'account_number'    => 'required|max:200',
                'bank_name'         => 'required|max:200',
                'bank_branch'       => 'required|max:200',
                'city'              => 'required|max:200',
                'type'              => 'required',
                'image'             => 'required',
            ],
            [
                'name.required' => 'This Name Field  is Required',
            ]
        );

        $image      = $request->file('image');
        $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/supplier/' . $name_gen);
        $save_url   = 'upload/supplier/' . $name_gen;

        Supplier::insert([
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'address'           => $request->address,
            'shopname'          => $request->shopname,
            'type'              => $request->type,
            'account_holder'    => $request->account_holder,
            'account_number'    => $request->account_number,
            'bank_name'         => $request->bank_name,
            'bank_branch'       => $request->bank_branch,
            'city'              => $request->city,
            'image'             => $save_url,
            'created_at'        => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Supplier Inserted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.supplier')->with($notification);
    }

    public function editSupplier($id)
    {
        $supplier   = Supplier::findOrFail($id);
        $title      = "Edit Supplier";

        return view('backend.supplier.edit_supplier', compact('title', 'supplier'));
    }

    public function updateSupplier(Request $request)
    {
        $supplier_id    = $request->id;
        $supplier       = Supplier::findOrFail($supplier_id);
        $old_image      = substr($supplier->image, -20);


        $validateData = $request->validate(
            [
                'name'              => 'required|max:200',
                'email'             => 'required|max:200',
                'phone'             => 'required|max:200',
                'address'           => 'required',
                'shopname'          => 'required',
                'account_holder'    => 'required|max:200',
                'account_number'    => 'required|max:200',
                'bank_name'         => 'required|max:200',
                'bank_branch'       => 'required|max:200',
                'city'              => 'required|max:200',
                'type'              => 'required',
            ],
            [
                'name.required' => 'This Name Field  is Required',
            ]
        );

        if ($request->file('image')) {

            if ($old_image != null) {
                unlink('upload/supplier/' . $old_image);
            }

            $image      = $request->file('image');
            $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/supplier/' . $name_gen);
            $save_url   = 'upload/supplier/' . $name_gen;

            Supplier::findOrFail($supplier_id)->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'address'           => $request->address,
                'shopname'          => $request->shopname,
                'type'              => $request->type,
                'account_holder'    => $request->account_holder,
                'account_number'    => $request->account_number,
                'bank_name'         => $request->bank_name,
                'bank_branch'       => $request->bank_branch,
                'city'              => $request->city,
                'image'             => $save_url,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Supplier Updated Successfull',
                'alert-type'    => 'success',
            );
        } else {
            Supplier::findOrFail($supplier_id)->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'address'           => $request->address,
                'shopname'          => $request->shopname,
                'type'              => $request->type,
                'account_holder'    => $request->account_holder,
                'account_number'    => $request->account_number,
                'bank_name'         => $request->bank_name,
                'bank_branch'       => $request->bank_branch,
                'city'              => $request->city,
                'updated_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Supplier Updated Successfull',
                'alert-type'    => 'success',
            );
        }
        return redirect()->route('all.supplier')->with($notification);
    }

    public function deleteSupplier($id)
    {
        $supplier_img   = Supplier::findOrFail($id);
        $img            = $supplier_img->image;
        unlink($img);

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Supplier Deleted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
