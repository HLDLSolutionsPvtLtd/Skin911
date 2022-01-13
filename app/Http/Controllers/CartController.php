<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function addToCart(Product $product, Request $request)
    {
        $user = $request->user();
        $price = 0;
        if($request->has('variant'))
        {
            $price = $product->variant->find($request->variant)->price->get();
        }
        else
        {
            $price = $product->price;
        }
        if($user->cart)
        {
            $user->cart->products()->attach($product, ['quantity'=> $request->quantity, 'subtotal' => $request->quantity * $price]);
        }
        else
        {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);

            $cart->products()->attach($product, ['quantity'=> $request->quantity, 'subtotal' => $request->quantity * $price]);
        }

        return response('success', 200);
    }
}
