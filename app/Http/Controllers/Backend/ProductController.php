<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct()
    {
        $product = Product::latest()->get();
        $title = "All Product";

        return view('backend.product.all_product', compact('title', 'product'));
    }

    public function addProduct()
    {
        $category   = Category::latest()->get();
        $supplier   = Supplier::latest()->get();
        $title      = "Add Category";

        return view('backend.product.add_product', compact('category', 'supplier', 'title'));
    }
}
