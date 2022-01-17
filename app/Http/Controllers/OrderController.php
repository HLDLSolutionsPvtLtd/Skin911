<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    //
    public function view(Request $request)
    {
        return Inertia::render('Orders', ['orders' => $request->user()->orders]);
    }

    public function create(Request $request)
    {
        $api = new Api(env('RZP_KEY'), env('RZP_SECRET'));
        $total = 0;
        $payment_type = 'rzp';
        $cart = $request->user()->cart;
        $products = $cart->products;
        foreach($products as $product)
        {
            $total = $total + ($product->pivot->quantity * $product->price);
        }
        if($request->cod)
        {
            $payment_type = 'cod';
        }
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total,
            'address_id' => $request->selectedAddress,
            'payment_type' => $payment_type,
        ]);
        foreach($products as $product)
        {
            $price = 0;
            if($product->pivot->variant != '')
            {
                $svariant = $product->variant->find($request->variant);
                $price = $svariant->price;
            }
            else
            {
                $price = $product->price;
            }

            $order->products()->attach($product, ['quantity' => $product->pivot->quantity, 'variant' => $product->pivot->variant, 'subtotal' => $product->pivot->quantity * $price]);
            $cart->products()->wherePivot('id', $product->pivot->id)->detach();
        }

        if(!$request->cod)
        {
            $rzp_order = $api->order->create(
                array(
                    'receipt' => (string)$order->id . 'ORD',
                    'currency' => 'INR',
                    'amount' => $total * 100,
                )
            );
            Transaction::create([
                'user_id' => $request->user()->id,
                'order_id' => $order->id,
                'amount' => $total,
                'razorpay_order_id' => $rzp_order->id
            ]);
            return  [
                'razorpayId' => $rzp_order->id,
                'amount' => $rzp_order->amount,
                'currency' => $rzp_order->currency
            ];

        }
        return $order;
    }

    public function cancel(Order $order, Request $request)
    {
        if($request->user()->id == $order->user_id)
        {
            $order->status ='canceled';
            $order->save();
            return response('success', 200);
        }
        else
        {
            return response("Denied",419);
        }
    }
    public function transaction(Request $request)
    {
        $transaction = Transaction::where('razorpay_order_id', $request->razorpay_order_id)->first();
        $transaction->razorpay_transaction_id = $request->razorpay_payment_id;
        $transaction->razorpay_transaction_signature = $request->razorpay_signature;
        $transaction->status = 'paid';
        $transaction->save();
        return response("success", 200);
    }
}
