<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function storeProduct(Request $request)
    {
        $image      = $request->file('product_image');
        $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/product/' . $name_gen);
        $save_url   = 'upload/product/' . $name_gen;

        Product::insert([
            'product_name'   => $request->product_name,
            'category_id'    => $request->category_id,
            'supplier_id'    => $request->supplier_id,
            'product_code'   => $request->product_code,
            'product_garage' => $request->product_garage,
            'product_store'  => $request->product_store,
            'buying_date'    => $request->buying_date,
            'expire_date'    => $request->expire_date,
            'buying_price'   => $request->buying_price,
            'selling_price'  => $request->selling_price,
            'product_image'  => $save_url,
            'created_at'     => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Product Inserted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.product')->with($notification);
    }

    public function editProduct($id)
    {
        $product    = Product::findOrFail($id);
        $category   = Category::latest()->get();
        $supplier   = Supplier::latest()->get();
        $title      = "Edit Product";

        return view('backend.product.edit_product', compact('title', 'product', 'category', 'supplier'));
    }

    public function updateProduct(Request $request)
    {

        $product_id     = $request->id;
        $product        = Product::findOrFail($product_id);
        $old_image      = substr($product->product_image, -21);


        if ($request->file('product_image')) {
            if ($old_image != null) {
                unlink('upload/product/' . $old_image);
            }

            $image      = $request->file('product_image');
            $name_gen   = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/product/' . $name_gen);
            $save_url   = 'upload/product/' . $name_gen;

            Product::findOrFail($product_id)->update([
                'product_name'   => $request->product_name,
                'category_id'    => $request->category_id,
                'supplier_id'    => $request->supplier_id,
                'product_code'   => $request->product_code,
                'product_garage' => $request->product_garage,
                'product_store'  => $request->product_store,
                'buying_date'    => $request->buying_date,
                'expire_date'    => $request->expire_date,
                'buying_price'   => $request->buying_price,
                'selling_price'  => $request->selling_price,
                'product_image'  => $save_url,
                'updated_at'     => Carbon::now(),
            ]);
        } else {

            Product::findOrFail($product_id)->update([
                'product_name'   => $request->product_name,
                'category_id'    => $request->category_id,
                'supplier_id'    => $request->supplier_id,
                'product_code'   => $request->product_code,
                'product_garage' => $request->product_garage,
                'product_store'  => $request->product_store,
                'buying_date'    => $request->buying_date,
                'expire_date'    => $request->expire_date,
                'buying_price'   => $request->buying_price,
                'selling_price'  => $request->selling_price,
                'updated_at'     => Carbon::now(),
            ]);
        }


        $notification = array(
            'message'       => 'Product Updated Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('all.product')->with($notification);
    }

    public function deleteProduct($id)
    {
        $product_img   = Product::findOrFail($id);
        $img            = $product_img->product_image;
        unlink($img);

        Product::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Product Deleted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
