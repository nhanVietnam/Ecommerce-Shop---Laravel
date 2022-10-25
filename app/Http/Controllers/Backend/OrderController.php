<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function PendingOrders(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function PendingOrdersDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        // dd($order);
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // dd($orderItem);
        return view('backend.orders.pending_orders_details',compact('order','orderItem'));
    }

    public function ConfirmedOrders(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    }

    public function ProcessingOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function PickedOrders(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }

    public function CancelOrders(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_orders',compact('orders'));
    }

    public function PendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([
            'status'=>'confirm'
        ]);

        $notification = array(
            'message' => 'Order Inserrted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('pending.orders')->with($notification);
    }

    public function ConfirmToProcessing($order_id){
        Order::findOrFail($order_id)->update([
            'status'=>'processing'
        ]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('confirmed.orders')->with($notification);
    }

    public function ProcessingToPicked($order_id){
        Order::findOrFail($order_id)->update([
            'status'=>'picked'
        ]);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('processing.orders')->with($notification);
    }

    public function PickedToShipped($order_id){
        Order::findOrFail($order_id)->update([
            'status'=>'shipped'
        ]);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('shipped.orders')->with($notification);
    }

    public function ShippedToDelivered($order_id){
        $products = OrderItem::where('order_id',$order_id)->get();
        // dd(gettype($products));
        foreach($products as $product){ 
            // dd($product->qty);
            Product::where('id',$product->product_id)->update([
                'product_quantity' => DB::raw('product_quantity-'. $product->qty),
            ]);
        }

        Order::findOrFail($order_id)->update([
            'status'=>'delivered'
        ]);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('delivered.orders')->with($notification);
    }

    public function DeliveredToCancel($order_id){
        Order::findOrFail($order_id)->update([
            'status'=>'cancel'
        ]);

        $notification = array(
            'message' => 'Order Canceled Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('cancel.orders')->with($notification);
    }

    public function AdminInvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        if($order == null){
            $isAdmin = Admin::findOrFail(Auth::id());
            // dd($isAdmin);
            $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        }
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // dd($orderItem);
        $invoice_pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $invoice_pdf->download('invoice.pdf');
    }
}
