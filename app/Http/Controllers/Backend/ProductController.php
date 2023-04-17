<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct()
    {
        $product = Product::latest()->get();
        $title = "All Product";

        return view('backend.product.all_product', compact('title', 'product'));
    }
}
