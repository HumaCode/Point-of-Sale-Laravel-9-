<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $category   = Category::latest()->get();
        $title      = "All Category";


        return view('backend.category.all_category', compact('title', 'category'));
    }

    public function storeCategory(Request $request)
    {
        Category::insert([
            'category_name' => $request->category_name,
            'created_at'    => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Category Inserted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
