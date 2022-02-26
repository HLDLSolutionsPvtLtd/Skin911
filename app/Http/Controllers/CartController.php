<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CartController extends Controller
{

    public function check(Request $request)
    {
        if($request->user()->cart)
        {
            return $request->user()->cart->new;
        }
        else
        {
            $cart = Cart::create([
                'user_id' => $request->user()->id
            ]);
           return $cart->new;
        }
    }
    public function view(Request $request)
    {
        $request->user()->cart->new = false;
        $request->user()->cart->save();
        return Inertia::render('Cart', ['products' => $request->user()->cart->products->load('discounts')]);
       
    }

    public function all(Request $request)
    {
        $user = $request->user();
        return $user->cart->products->load('discounts');
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
            $user->cart->products()->attach($product, ['quantity'=> $request->quantity ? $request->quantity : '1',  'variant' => $variant]);
            $user->cart->new = true;
            $user->cart->save();
        }
        else
        {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
            return $cart->products()->attach($product, ['quantity'=> $request->quantity ? $request->quantity : '1', 'variant' => $variant]);
            $cart->new = true;
            $user->cart->save();
        }

        return  Redirect::back()->with('success');
    }

    public function removeProduct(Cart $cart, Product $product, Request $request)
    {
        $cart->products()->wherePivot('id', $request->id)->detach();
        return redirect()->back();
    }
}
