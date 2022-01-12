<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Brandcontroller extends Controller
{
    //
    public function all()
    {
        return Brand::all();
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
        Brand::create([
            'name' => $request->name,
            'img' => $path
        ]);

        return redirect()->back();
    }

    public function update(Brand $brand, Request $request)
    {
        $brand->name = $request->name;
        Storage::disk('public')->delete($brand->img);
        $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);

        $brand->img = $path;

        $brand->save();

        return redirect()->back();

    }

    public function delete(Brand $brand)
    {
        Storage::disk('public')->delete($brand->img);
        $brand->delete();

        return response('success', 200);

    }
}
