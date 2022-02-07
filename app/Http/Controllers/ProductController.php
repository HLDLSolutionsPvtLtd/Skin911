<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::search($request->key)->get();
        return Inertia::render('Search', ['products' => $products->load('discounts')]);

    }

    public function all(Request $request)
    {
        if($request->has('filter'))
        {
            return Product::where('brand_id', $request->filter)->orWhere('category_id', $request->filter)->with('discounts')->orderBy($request->var, $request->val)->paginate(1);
        }
        else
        {
            return Product::orderBy($request->var, $request->val)->with('discounts')->paginate(1);
        }
    }

    public function detailView(Product $product)
    {
        return Inertia::render('Product', ['product' => $product->load('discounts')]);
    }
}
