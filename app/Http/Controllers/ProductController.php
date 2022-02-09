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
            return Product::where('brand_id', $request->filter)->orWhere('category_id', $request->filter)->orWhereHas('discounts',
            function($q) use($request)
            {
                $q->where('name', $request->filter);
            })->with('discounts')->orderBy($request->var, $request->val)->paginate(1);
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

    public function related(Request $request)
    {
        return Product::where('category_id', $request->category_id)->where('id' , '!=', $request->id)->orWhere('brand_id', $request->brand_id)->where('id' , '!=', $request->id)->with('discounts')->get();
    }

    public function topSelling()
    {
        $products = Product::withCount('orders')
            ->get()
            ->sortBy('orders_count', SORT_REGULAR, true)
            ->take(10);

        return $products;
    }

    /**
     * Get new arrivals
     *
     * @return JsonResponse
     */
    public function newArrivals()
    {
        $startDate = now()->subDays(2);
        $endDate = now();

        $products = Product::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();

        return $products;
    }
}
