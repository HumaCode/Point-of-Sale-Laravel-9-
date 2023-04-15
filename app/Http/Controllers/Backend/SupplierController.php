<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function allSupplier()
    {
        $supplier   = Supplier::latest()->get();
        $title      = "Supplier";

        return view('backend.supplier.all_supplier', compact('supplier', 'title'));
    }
}
