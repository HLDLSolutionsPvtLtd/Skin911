<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function all()
    {
        return Product::all();
    }

    public function detailView(Product $product)
    {
        return Inertia::render('Product', ['product' => $product]);
    }
}
