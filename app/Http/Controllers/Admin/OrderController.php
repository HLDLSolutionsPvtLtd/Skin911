<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    public function view()
    {
        return Inertia::render('Admin/Orders', ['orders' => Order::all()]);
    }

    public function updateStatus(Order $order, Request $request)
    {
        $order->status = $request->status;
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
        return Order::where('status', $request->status)->get();
    }

    public function search(Request $request)
    {
        return Order::where('status', $request->key)->get();
    }
}
