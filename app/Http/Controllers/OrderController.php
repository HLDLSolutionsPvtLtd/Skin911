<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
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
        $api = new Api(env('RZP_KEY'),env('RZP_SECRET'));
        $total = 0;
        $payment_type = 'rzp';
        $cart = $request->user()->cart;
        $products = $cart->products;
        foreach($products as $product)
        {
            
            if($product->pivot->variant)
            {
               $variant = $product->variant->where('name', $product->pivot->variant)->first();
               $total = $total + ($product->pivot->quantity * $variant->price);
            }
            else
            {
                $total = $total + ($product->pivot->quantity * $product->price);
            }
        }
        if($request->cod)
        {
            $payment_type = 'cod';
        }
        $shipping_fee = 0;
            return $free = Shipping::where('name', 'free')->first();
            if($free)
            {
                if($free->fee < $total)
                {
                    $shipping_fee = 0;
                }
            }
            else
            {
                $fee = Shipping::where('pincode', $request->pincode)->first();
                if($fee)
                {
                    $shipping_fee = $fee->fee;
                    $total = $total + $shipping_fee;
                }
                else
                {
                    $fee = Shipping::where('name', 'Default')->first();
                    $shipping_fee = $fee->fee;
                    $total = $total + $shipping_fee;
                }
            }
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total,
            'shipping_fee' => $shipping_fee,
            'address_id' => $request->selectedAddress,
            'payment_type' => $payment_type,
        ]);
        foreach($products as $product)
        {
            $price = 0;
            if($product->pivot->variant)
            {
                $svariant = $product->variant->where('name', $product->pivot->variant)->first();
                $price = $svariant->price;
            }
            else
            {
                $price = $product->price;
            }

            $order->products()->attach($product, ['quantity' => $product->pivot->quantity, 'variant' => $product->pivot->variant, 'subtotal' => $product->pivot->quantity * $price]);
            $cart->products()->wherePivot('id', $product->pivot->id)->detach();
            $product->quantity = $product->quantity--;
            $product->save();
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
            return[
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
            if($order->status != "out_for_delivery")
            {
                $order->status ='cancelled';
                foreach($order->products as $product)
                {
                    $product->quantity = $product->quantity++;
                }
                $order->save();
                return redirect()->back();
            }
            else
            {
                return response("This order can not be canceled", 419);
            }
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

    public function buynow(Product $product, Request $request)
    {
        $variant = '';
        if($request->variant)
        {
            $variant = $product->variant->where('id', $request->variant)->first();
        }
        return Inertia::render('Buynow', ['product' => $product, 'quantity' => $request->quantity, 'variant' => $variant]);
    }

    public function buynowCreate(Product $product, Request $request)
    {
        $api = new Api(env('RZP_KEY'), env('RZP_SECRET'));
        $total = 0;
        $payment_type = 'rzp';
        $cart = $request->user()->cart;
        
        if($request->variant)
        {
            $total = $total + ($request->quantity * $request->variant->price);
        }
        else
        {
            $total = $total + ($request->quantity * $product->price);
        }
        
        if($request->cod)
        {
            $payment_type = 'cod';
        }

        $shipping_fee = 0;
        $free = Shipping::where('name', 'free')->first();
        if($free->fee < $total)
        {
            $shipping_fee = 0;
        }
        else
        {
            $fee = Shipping::where('pincode', $request->pincode)->first();
            if($fee)
            {
                $shipping_fee = $fee->fee;
                $total = $total + $shipping_fee;
            }
            else
            {
                $fee = Shipping::where('name', 'Default')->first();
                $shipping_fee = $fee->fee;
                $total = $total + $shipping_fee;
            }
        }
            
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total,
            'address_id' => $request->selectedAddress,
            'payment_type' => $payment_type,
        ]);
        
        $price = 0;
        if($request->variant)
        {
            $price = $request->variant->price;
        }
        else
        {
            $price = $product->price;
        }
            $order->products()->attach($product, ['quantity' => $request->quantity, 'variant' =>  $request->variant ? $request->variant->id : '', 'subtotal' => $request->quantity * $price]);
            $product->quantity = $product->quantity--;
            $product->save();

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
}
