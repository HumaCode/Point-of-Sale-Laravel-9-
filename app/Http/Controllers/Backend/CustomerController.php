<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function allCustomer()
    {
        $customer   = Customer::latest()->get();
        $title      = "Customer";

        return view('backend.customer.all_customer', compact('customer', 'title'));
    }
}
