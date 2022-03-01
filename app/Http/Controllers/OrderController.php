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
use phpDocumentor\Reflection\Types\Boolean;

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
        $products = $cart->products->load('discounts');
        foreach($products as $product)
        {
            if($product->pivot->variant)
            {
                $variant = $product->variant->where('id', $product->pivot->variant)->first();
                if($product->discounts->isNotEmpty())
                {
                        if($product->discounts[0]->type == 'percentage')
                        {
                            $total = $total  + ($product->pivot->quantity * $variant->price - ((($product->discounts[0]->amount * $product->pivot->quantity)  * ($variant->price * $product->pivot->quantity))/100));
                        }
                        else
                        {
                            $total = $total + (($product->pivot->quantity * $variant->price) - ($product->discounts[0]->amount * $product->pivot->quantity));
                        }
                }
                else if($product->brand->discounts->isNotEmpty())
                {
                        if($product->brand->discounts[0]->type == 'percentage')
                        {
                            $total = $total  + ($product->pivot->quantity * $variant->price - ((($product->brand->discounts[0]->amount * $product->pivot->quantity)  * ($variant->price * $product->pivot->quantity))/100));
                        }
                        else
                        {
                            $total = $total + (($product->pivot->quantity * $variant->price) - ($product->brand->discounts[0]->amount * $product->pivot->quantity));
                        }
                }
                else if($product->category->discounts->isNotEmpty())
                {

                        if($product->category->discounts[0]->type == 'percentage')
                        {
                            $total = $total  + ($product->pivot->quantity * $variant->price - ((($product->category->discounts[0]->amount * $product->pivot->quantity)  * ($variant->price * $product->pivot->quantity))/100));
                        }
                        else
                        {
                            $total = $total + (($product->pivot->quantity * $variant->price) - ($product->category->discounts[0]->amount * $product->pivot->quantity));
                        }
                }
                else
                {
                        $total = $total + ($product->pivot->quantity * $variant->price);
                }
            }
            else
            {
                if($product->discounts->isNotEmpty())
                {
                        if($product->discounts[0]->type == 'percentage')
                        {
                            $total = $total  + ($product->pivot->quantity * $product->price - ((($product->discounts[0]->amount * $product->pivot->quantity)  * ($product->price * $product->pivot->quantity))/100));
                        }
                        else
                        {
                            $total = $total + (($product->pivot->quantity * $product->price) - ($product->discounts[0]->amount * $product->pivot->quantity));
                        }
                }
                else if($product->brand->discounts->isNotEmpty())
                {
                        if($product->brand->discounts[0]->type == 'percentage')
                        {
                            $total = $total  + ($product->pivot->quantity * $product->price - ((($product->brand->discounts[0]->amount * $product->pivot->quantity)  * ($product->price * $product->pivot->quantity))/100));
                        }
                        else
                        {
                            $total = $total + (($product->pivot->quantity * $product->price) - ($product->brand->discounts[0]->amount * $product->pivot->quantity));
                        }
                }
                else if($product->category->discounts->isNotEmpty())
                {

                        if($product->category->discounts[0]->type == 'percentage')
                        {
                            $total = $total  + ($product->pivot->quantity * $product->price - ((($product->category->discounts[0]->amount * $product->pivot->quantity)  * ($product->price * $product->pivot->quantity))/100));
                        }
                        else
                        {
                            $total = $total + (($product->pivot->quantity * $product->price) -  ($product->category->discounts[0]->amount * $product->pivot->quantity));
                        }
                }
                else
                {
                        $total = $total + ($product->pivot->quantity * $product->price);
                }
    
            }
        }
        if($request->cod)
        {
            $payment_type = 'cod';
        }
            $shipping_fee = 0;
            $free = Shipping::where('name', 'free')->first();
            if($free)
            {
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
                    }
                    else
                    {
                        $fee = Shipping::where('name', 'Default')->first();
                        $shipping_fee = $fee->fee;
                    }
                }
            }
            else
            {
                $fee = Shipping::where('pincode', $request->pincode)->first();
                if($fee)
                {
                    $shipping_fee = $fee->fee;
                }
                else
                {
                    $fee = Shipping::where('name', 'Default')->first();
                    $shipping_fee = $fee->fee;
                }
            }
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total + $shipping_fee,
            'shipping_fee' => $shipping_fee,
            'address_id' => $request->selectedAddress,
            'payment_type' => $payment_type,
        ]);
        foreach($products as $product)
        {
            if($product->pivot->variant)
            {
               $svariant = $product->variant->where('id', $product->pivot->variant)->first();
               $order->products()->attach($product, ['quantity' => $product->pivot->quantity, 'variant' => $svariant->id, 'subtotal' => $total]);

            }
            else
            {
                $order->products()->attach($product, ['quantity' => $product->pivot->quantity, 'variant' => '', 'subtotal' => $total]);
            }

            $cart->products()->wherePivot('id', $product->pivot->id)->detach();
            // if($request->variant)
            // {
            //     $product->variant->where('name', $request->variant)->quantity = $product->variant->where('name', $request->variant)->quantity--;
            // }
            // else
            // {
            //     $product->quantity = $product->quantity--;
            // }
            // $product->save();
        }

        if(!$request->cod)
        {
            $rzp_order = $api->order->create(
                array(
                    'receipt' => (string)$order->id . 'ORD',
                    'currency' => 'INR',
                    'amount' => ($total + $shipping_fee) * 100,
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
                    if($product->pivot->variant)
                    {
                        $product->variant->where('id', $product->pivot->variant)->quantity = $product->variant->where('id', $product->pivot->variant)->quantity++;
                    }
                    else
                    {
                        $product->quantity = $product->quantity--;
                    }
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
        return Inertia::render('Buynow', ['product' => $product->load('discounts'), 'quantity' => $request->quantity, 'variant' => $variant]);
    }

    public function buynowCreate(Product $product, Request $request)
    {
        $api = new Api(env('RZP_KEY'), env('RZP_SECRET'));
        $total = 0;
        $payment_type = 'rzp';
        if($request->variant)
        {
           if($product->discounts->isNotEmpty())
           {
                if($product->discounts[0]->type == 'percentage')
                {
                    $total = $total  + (($request->quantity * $request->variant['price']) - ((($product->discounts[0]->amount * $request->quantity)  * ($request->variant['price'] * $request->quantity))/100));
                }
                else
                {
                    $total = $total + (($request->quantity * $request->variant['price']) - ($product->discounts[0]->amount * $request->quantity));
                }
           }
           else if($product->brand->discounts->isNotEmpty())
           {
                if($product->brand->discounts->type == 'percentage')
                {
                    $total = $total  + (($request->quantity * $request->variant['price']) - ((($product->brand->discounts->amount * $request->quantity)  * ($request->variant['price'] * $request->quantity))/100));
                }
                else
                {
                    $total = $total + (($request->quantity * $request->variant['price']) - ($product->brand->discounts->amount * $request->quantity));
                }
           }
           else if($product->category->discounts->isNotEmpty())
           {

                if($product->category->discounts->type == 'percentage')
                {
                    $total = $total  + (($request->quantity * $request->variant['price']) - ((($product->category->discounts->amount * $request->quantity)  * ($request->variant['price'] * $request->quantity))/100));
                }
                else
                {
                    $total = $total + (($request->quantity * $request->variant['price']) - ($product->category->discounts->amount * $request->quantity));
                }
           }
           else
           {
                $total = $total + ($request->quantity * $request->variant['price']);
           }
        }
        else
        {
            if($product->discounts->isNotEmpty())
           {
                if($product->discounts[0]->type == 'percentage')
                {
                    $total = $total  + ($request->quantity * $product->price - ((($product->discounts[0]->amount * $request->quantity)  * ($product->price * $request->quantity))/100));
                }
                else
                {
                    $total = $total + (($request->quantity * $product->price) - ($product->discounts[0]->amount * $request->quantity));
                }
           }
           else if($product->brand->discounts->isNotEmpty())
           {
                if($product->brand->discounts->type == 'percentage')
                {
                    $total = $total  + ($request->quantity * $product->price - ((($product->brand->discounts->amount * $request->quantity)  * ($product->price * $request->quantity))/100));
                }
                else
                {
                    $total = $total + (($request->quantity * $product->price) - ($product->brand->discounts->amount * $request->quantity));
                }
           }
           else if($product->category->discounts->isNotEmpty())
           {

                if($product->category->discounts->type == 'percentage')
                {
                    $total = $total  + ($request->quantity * $product->price - ((($product->category->discounts->amount * $request->quantity)  * ($product->price * $request->quantity))/100));
                }
                else
                {
                    $total = $total + (($request->quantity * $product->price) -  ($product->category->discounts->amount * $request->quantity));
                }
           }
           else
           {
                $total = $total + ($request->quantity * $product->price);
           }
        }
        if($request->cod)
        {
            $payment_type = 'cod';
        }
        $shipping_fee = 0;
        $free = Shipping::where('name', 'free')->first();
        if($free)
        {
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
                }
                else
                {
                    $fee = Shipping::where('name', 'Default')->first();
                    $shipping_fee = $fee->fee;
                }
            }
        }
        else
        {
            $fee = Shipping::where('pincode', $request->pincode)->first();
            if($fee)
            {
                $shipping_fee = $fee->fee;

            }
            else
            {
                $fee = Shipping::where('name', 'Default')->first();
                $shipping_fee = $fee->fee;
            }
        }
        
        $order = Order::create([
            'user_id' => $request->user()->id,
            'shipping_fee' => $shipping_fee,
            'total' => $total + $shipping_fee,
            'address_id' => $request->selectedAddress,
            'payment_type' => $payment_type,
        ]);
        
        $price = 0;
        
        $order->products()->attach($product, ['quantity' => $request->quantity, 'variant' =>  $request->variant ? $request->variant['id'] : '', 'subtotal' => $total]);
        // if($request->variant)
        // {
        //     $product->variant->where('name', $request->variant)->quantity = $product->variant->where('name', $request->variant)->quantity--;
        // }
        // else
        // {
        //     $product->quantity = $product->quantity--;
        // }
        // $product->save();

        if(!$request->cod)
        {
            $rzp_order = $api->order->create(
                array(
                    'receipt' => (string)$order->id . 'ORD',
                    'currency' => 'INR',
                    'amount' => ($total + $shipping_fee) * 100,
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
