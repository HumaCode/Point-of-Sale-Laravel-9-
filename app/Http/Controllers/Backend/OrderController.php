<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetails;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function finalInvoice(Request $request)
    {
        $data                   = array();
        $data['customer_id']    = $request->customer_id;
        $data['order_date']     = $request->order_date;
        $data['order_status']   = $request->order_status;
        $data['total_products'] = $request->total_product;
        $data['sub_total']      = $request->sub_total;
        $data['vat']            = $request->vat;

        $data['invoice_no']     = 'EPOS' . mt_rand(10000000, 99999999);
        $data['payment_status'] = $request->payment_status;
        $data['total']          = $request->total;
        $data['pay']            = $request->pay;
        $data['due']            = $request->due;
        $data['created_at']     = Carbon::now();

        $order_id               = Order::insertGetId($data);
        $contents               = Cart::content();

        $pdata                  = array();
        foreach ($contents as $content) {
            $pdata['order_id']      = $order_id;
            $pdata['product_id']    = $content->id;
            $pdata['quantity']      = $content->qty;
            $pdata['unitcost']      = $content->price;
            $pdata['total']         = $content->total;

            $insert = Orderdetails::insert($pdata);
        }

        $notification = array(
            'message'       => 'Order Completed',
            'alert-type'    => 'success',
        );

        Cart::destroy();

        return redirect()->route('dashboard')->with($notification);
    }
}
