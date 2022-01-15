<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Razorpay\Api\Api;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function create(Request $request)
    {
        $api = new Api(env('RZP_KEY'), env('RZP_SECRET'));
        $total = 0;
        $cart = $request->user()->cart;
        $products = $cart->products;
        foreach($products as $product)
        {
            $total = $total + ($product->pivot->quantity * $product->price);
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total,
        ]);
        foreach($products as $product)
        {
            $order->products()->attach($product);
            $cart->products()->wherePivot('id', $product->pivot->id)->detach();
        }
    }
}
