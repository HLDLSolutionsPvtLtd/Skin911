<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function all(Request $request)
    {
        $user = $request->user();
        return $user->cart->products;
    }

    public function updateQty(Request $request)
    {
        $cart = $request->user()->cart;
        $cart->products()->updateExistingPivot($request->id, ['quantity' => $request->qty,]);
        return redirect()->back();        
    }
    public function addToCart(Product $product, Request $request)
    {
        $user = $request->user();
        $price = 0;
        $variant = '';
        if($request->variant != null)
        {
            $svariant = $product->variant->find($request->variant);
            $price = $svariant->price;
            $variant = $svariant->name;
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

            $cart->products()->attach($product, ['quantity'=> $request->quantity, 'subtotal' => $request->quantity * $price, 'variant' => $variant]);
        }

        return redirect()->back();
    }
}
