<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'price' => 'nullable'
        ]);

        $product = Product::create($validated);

        if($request->has('variants'))
        {
            foreach($request->variants as $variant)
            {
                Variant::create([
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'quantity' => $variant['quantity'],
                    'product_id' => $product->id
                ]);
            }
        }

        if($request->has('images'))
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
    public function getAll()
    {
        return Product::all();
    }

    public function editProduct(Product $product)
    {
        return Inertia::render('Admin/EditProduct', ['product' => $product]);
    }

    public function deleteProductImage(Image $image)
    {
        Storage::disk('public')->delete($image->link);
        $image->delete();
        return response('success', 200);
    }

    public function updateVariant(Variant $variant, Request $request)
    {
        $variant->name = $request->name;
        $variant->quantity = $request->quantity;
        $variant->price = $request->price;

        $variant->save();

        return response('success', 200);
    }

    public function updateProduct(Product $product,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'price' => 'nullable'
        ]);

        $product->update($validated);

        if($request->has('variants'))
        {
            foreach($request->variants as $variant)
            {
                Variant::create([
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'quantity' => $variant['quantity'],
                    'product_id' => $product->id
                ]);
            }
        }

        if($request->has('images'))
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

    public function deleteVariant(Variant $variant)
    {
        $variant->delete();

        return response('success', 200);
    }

    public function deleteProduct(Product $product)
    {
        $variants = Variant::where('product_id', $product->id)->get();
        $images = Image::where('product_id', $product->id)->get();

        foreach($variants as $variant)
        {
            $variant->delete();
        }

        foreach($images as $image)
        {
            Storage::disk('public')->delete($image->link);
            $image->delete();
        }
        $product->delete();
        return response('success', 200);
    }

    public function search(Request $request)
    {
        return Inertia::render('Admin/Products', ['products' => Product::search($request->key)->get()]);
    }

    public function outOfStock()
    {
        return Inertia::render('Admin/Products', ['products' => Product::where('quantity', 0)->get()]);
    }

    public function updateTag(Request $request)
    {
        foreach($request->ids as $id)
        {
            $product = Product::find($id);
            $product->tag = $request->tag;
            $product->save();
        }

        return redirect()->back();
    }
}
