<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function finalInvoice(Request $request)
    {

        $rtotal = $request->total;
        $rpay = $request->pay;
        $mtotal = $rtotal - $rpay;

        // return  is_numeric($request->total);
        // return  $rtotal;
        // return  $mtotal;
        // return $rpay;
        // return $rtotal;
        // return is_numeric($rpay);

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
        $data['due']            = $mtotal;
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

    public function pendingOrder()
    {
        $orders = Order::where('order_status', 'pending')->get();
        $title  = "Pending Order";

        return view('backend.order.pending_order', compact('title', 'orders'));
    }

    public function detailOrder($order_id)
    {
        $order      = Order::where('id', $order_id)->first();
        $title      = "Detail Order";
        $orderItem  = Orderdetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('backend.order.order_details', compact('title', 'order', 'orderItem'));
    }

    public function orderStatusUpdate(Request $request)
    {
        $order_id = $request->id;

        // update stock in store
        $product  = Orderdetails::where('order_id', $order_id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update([
                    'product_store' => DB::raw('product_store-' . $item->quantity)
                ]);
        }

        Order::findOrFail($order_id)->update([
            'order_status' => 'complete',
        ]);

        $notification = array(
            'message'       => 'Order Done',
            'alert-type'    => 'success',
        );

        return redirect()->route('pending.order')->with($notification);
    }

    public function completeOrder()
    {
        $orders = Order::where('order_status', 'complete')->get();
        $title  = "Complete Order";

        return view('backend.order.complete_order', compact('title', 'orders'));
    }

    public function stockManage()
    {
        $product    = Product::latest()->get();
        $title      = "Stock Management";

        return view('backend.stock.all_stock', compact('title', 'product'));
    }

    public function orderInvoice($order_id)
    {
        $order      = Order::where('id', $order_id)->first();
        // $title      = "Detail Order";
        $orderItem  = Orderdetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir'   => public_path(),
            'chroot'    => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function pendingDue()
    {
        $alldue = Order::where('due', '>', '0')->orderBy('id', 'DESC')->get();
        $title      = "Pending Due";


        return view('backend.order.pending_due', compact('alldue', 'title'));
    }

    public function orderDueAjax($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    public function updateDue(Request $request)
    {
        $order_id = $request->id;
        $due_amount = $request->due;
        $pay_amount = $request->pay;

        $allorder = Order::findOrFail($order_id);

        $maindue = $allorder->due;
        $mainpay = $allorder->pay;

        $paid_due = $maindue - $due_amount;
        $paid_pay = $mainpay - $due_amount;

        Order::findOrFail($order_id)->update([
            'due' => $paid_due,
            'pay' => $paid_pay,
        ]);

        $notification = array(
            'message'       => 'Due Amount Updated Completed',
            'alert-type'    => 'success',
        );

        return redirect()->route('pending.due')->with($notification);
    }
}
