<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function allCustomer()
    {
        $customer   = Customer::latest()->get();
        $title      = "Customer";

        return view('backend.customer.all_customer', compact('customer', 'title'));
    }

    public function addCustomer()
    {
        $title      = "Add Customer";

        return view('backend.customer.add_customer', compact('title'));
    }

    public function storeCustomer(Request $request)
    {
        $validateData = $request->validate(
            [
                'name'              => 'required|max:200',
                'email'             => 'required|unique:customers|max:200',
                'phone'             => 'required|max:200',
                'address'           => 'required',
                'shopname'          => 'required',
                'account_holder'    => 'required|max:200',
                'account_number'    => 'required|max:200',
                'bank_name'         => 'required|max:200',
                'bank_branch'       => 'required|max:200',
                'city'              => 'required|max:200',
                'image'             => 'required',
            ],
            [
                'name.required' => 'This Name Field  is Required',
            ]
        );

        $image      = $request->file('image');
        $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/customer/' . $name_gen);
        $save_url   = 'upload/customer/' . $name_gen;

        Customer::insert([
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'address'           => $request->address,
            'shopname'          => $request->shopname,
            'account_holder'    => $request->account_holder,
            'account_number'    => $request->account_number,
            'bank_name'         => $request->bank_name,
            'bank_branch'       => $request->bank_branch,
            'city'              => $request->city,
            'image'             => $save_url,
            'created_at'        => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Customer Inserted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.customer')->with($notification);
    }
}
