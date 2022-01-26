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
        return Inertia::render('Search', ['products' => $products]);

    }

    public function all(Request $request)
    {
        if($request->has('filter'))
        {
            return Product::where('brand_id', $request->filter)->orWhere('category_id', $request->filter)->orderBy($request->var, $request->val)->paginate(1);
        }
        else
        {
            return Product::orderBy($request->var, $request->val)->paginate(1);
        }
    }

    public function detailView(Product $product)
    {
        return Inertia::render('Product', ['product' => $product]);
    }
}
