<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function pos()
    {
        $title      = "POS";
        $product    = Product::latest()->get();
        $customer   = Customer::latest()->get();

        return view('backend.pos.pos_page', compact('title', 'product', 'customer'));
    }

    public function addCart(Request $request)
    {
        Cart::add([
            'id'        => $request->id,
            'name'      => $request->name,
            'qty'       => $request->qty,
            'price'     => $request->price,
            'weight'    => 20,
            'options'   => [
                'size'  => 'large'
            ]
        ]);

        $notification = array(
            'message'       => 'Product Added Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function allItem()
    {
        $product_item   = Cart::content();
        $title          = "Cart";

        return view('backend.pos.text_time', compact('title', 'product_item'));
    }

    public function cartUpdate(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);

        $notification = array(
            'message'       => 'Cart Updated Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
