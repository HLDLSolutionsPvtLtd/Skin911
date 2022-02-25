<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    public function view()
    {
        return Inertia::render('Admin/Orders', ['orders' => Order::orderBy('created_at', 'desc')->get()]);
    }

    public function updateStatus(Order $order, Request $request)
    {
        $order->status = $request->status;
        if($request->status == 'cancelled' || $request->status == 'denied' || $request->status == 'returned')
        {
            foreach($order->products as $product)
            {
                if($product->variant)
                {
                   $product->variant->where('name', $product->variant)->quantity = ++$product->variant->where('name', $product->variant)->quantity;
                }
                else
                {
                    $product->quantity = ++$product->quantity;
                }
            }
        }
        else if($request->status == 'accepted')
        {
            foreach($order->products as $product)
            {
                if($product->variant)
                {
                    $product->variant->where('name', $product->pivot->variant)->quantity = --$product->variant->where('name', $product->pivot->variant)->quantity;
                }
                else
                {
                    $product->quantity = --$product->quantity;
                }
            }
        }
        $order->save();

        return redirect()->back();
    }

    public function refund(Order $order)
    {
        if($order->transaction->status == 'paid')
        {
            $api = new Api(env('RZP_KEY'), env('RZP_SECRET'));
            $api->payment->fetch($order->transaction->razorpay_transaction_id)->refund(array("amount"=> $order->total * 100, "speed"=>"normal"));
            $order->transaction->status = 'refunded';
            $order->transaction->save();
        }
        return redirect()->back();

    }

    public function searchOrders(Request $request)
    {
        if($request->status == 'all')
        {
            return Inertia::render('Admin/Orders', ['orders' => Order::orderBy('created_at', 'desc')->get()]);
        }
        else
        {
            return Inertia::render('Admin/Orders', ['orders' => Order::where('status', $request->status)->orderBy('created_at', 'desc')->get()]);
        }
    }

    public function search(Request $request)
    {
        return Inertia::render('Admin/Orders', ['orders' => Order::where('id', 'like',  "%$request->key%")->orderBy('created_at', 'desc')->get()]);
    }
}
