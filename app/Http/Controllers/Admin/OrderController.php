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
        return Inertia::render('Admin/Orders', ['orders' => Order::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function updateStatus(Order $order, Request $request)
    {
        $order->status = $request->status;
        if($request->status == 'cancelled' || $request->status == 'returned')
        {
            foreach($order->products as $product)
            {
                if($product->pivot->variant)
                {
                   ++$product->variant->where('id', $product->pivot->variant)->first()->quantity;
                   $product->variant->where('id', $product->pivot->variant)->first()->save();
                }
                else
                {
                    ++$product->quantity;
                    $product->save();
                }
            }
            $order->status = $request->status;
        }
        else if($request->status == 'accepted')
        {
            foreach($order->products as $product)
            {
                if($product->pivot->variant)
                {
                    if($product->variant->where('id', $product->pivot->variant)->first()->quantity > 0)
                    {
                        --$product->variant->where('id', $product->pivot->variant)->first()->quantity;
                        $product->variant->where('id', $product->pivot->variant)->first()->save();
                    }
                    else
                    {
                        return redirect()->back()->withErrors(['msg' => 'This Product is out of stock']);;
                    }
                }
                else
                {
                    if($product->quantity > 0)
                    {
                        --$product->quantity;
                        $product->save();
                    }
                    else
                    {
                        return redirect()->back()->withErrors(['msg' => 'This Product is out of stock']);;
                    }
                    
                }
                
            }
            $order->status = $request->status;
           
        }
        else if($request->status == 'denied')
        {
            $order->status = $request->status;
            $order->remarks = $request->remarks;
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
