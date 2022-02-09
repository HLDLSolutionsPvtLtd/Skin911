<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function all()
    {
        return Banner::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'image'=> 'image|required',
            'key'  => 'nullable',
            'type' => 'string|required',
            'description' => 'string'
        ]);

        $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
        Banner::create([
            'image' => $path,
            'key' => $request->key,
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        return redirect()->back();
    }

    public function update(Banner $banner, Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'image'=> 'image|nullable',
            'key'  => 'nullable',
            'type' => 'string|required',
            'description' => 'string'
        ]);
        if($request->image)
        {
            if($banner->image)
            {
                Storage::disk('public')->delete($banner->img);
            }
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
            $banner->img = $path;
        }
        $banner->name = $request->name;
        $banner->key = $request->key;
        $banner->description = $request->description;
        $banner->type = $request->type;
        
        $banner->save();
        return redirect()->back();
    }

    public function remove(Banner $banner)
    {
        $banner->delete();
        return redirect()->back();
    }
}
