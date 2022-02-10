<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CartController extends Controller
{

    public function view(Request $request)
    {
        if($request->user()->cart)
        {
            return Inertia::render('Cart', ['products' => $request->user()->cart->products]);
        }
        else
        {
            $cart = Cart::create([
                'user_id' => $request->user()->id
            ]);
            return Inertia::render('Cart', ['products' => $cart->products]);
        }
    }

    public function all(Request $request)
    {
        $user = $request->user();
        return $user->cart->products;
    }

    public function updateQty(Request $request)
    {
        $cart = $request->user()->cart;
        $cart->products()->wherePivot('id', $request->id)->updateExistingPivot($request->p_id, ['quantity' => $request->qty]);
        return redirect()->back();        
    }
    public function addToCart(Product $product, Request $request)
    {
        $user = $request->user();
        $variant = '';
        if($request->variant != null)
        {
            $svariant = $product->variant->find($request->variant);
            $variant = $svariant->name;
        }
        else
        {
            $price = $product->price;
        }
        if($user->cart)
        {
            $user->cart->products()->attach($product, ['quantity'=> $request->quantity ? $request->quantity : '1']);
        }
        else
        {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);

            $cart->products()->attach($product, ['quantity'=> $request->quantity ? $request->quantity : '1', 'variant' => $variant]);
        }

        return  Redirect::back()->with('success');
    }

    public function removeProduct(Cart $cart, Product $product, Request $request)
    {
        $cart->products()->wherePivot('id', $request->id)->detach();
        return redirect()->back();
    }
}
