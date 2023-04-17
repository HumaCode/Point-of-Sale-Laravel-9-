<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $category   = Category::latest()->get();
        $title      = "All Category";


        return view('backend.category.all_category', compact('title', 'category'));
    }
}