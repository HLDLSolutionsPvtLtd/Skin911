<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'price' => 'nullable'
        ]);

        $product = Product::create($validated);

        if(count($request->variants) != 0)
        {
            foreach($request->variants as $variant)
            {
                Variant::create([
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'product_id' => $product->id
                ]);
            }
        }

        if(count($request->images) != 0)
        {
            foreach($request->images as $image)
            {
                $path = $image->storeAs('media', Str::uuid() . '.' . $image->getClientOriginalExtension(), [ 'disk'=> 'public']);
                Image::create([
                    'link' => $path,
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect()->back();
    }
}
