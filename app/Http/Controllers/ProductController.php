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
    public function shopAll()
    {
        return Product::limit(8)->with('discounts')->get();
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
        return Product::where('category_id', $request->category_id)->orWhere('brand_id', $request->brand_id)->with('discounts')->get()->where('id' , '!=', $request->id);
    }

    public function topSelling()
    {
        $products = Product::withCount('orders')
            ->with('discounts')->get()
            ->sortBy('orders_count', SORT_REGULAR, true)
            ->take(6);

        return $products;
    }

    /**
     * Get new arrivals
     *
     * @return JsonResponse
     */
    public function newArrivals()
    {
        $startDate = now()->subDays(32);
        $endDate = now();

        $products = Product::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->with('discounts')->get();

        return $products;
    }

    public function sale()
    {
        return Product::whereHas('discounts')->orWhereHas('category', function($q){
            $q->whereHas('discounts');
        })->orWhereHas('brand', function($q){
            $q->whereHas('discounts');
        })->with('discounts')->paginate(2);
    }
}
