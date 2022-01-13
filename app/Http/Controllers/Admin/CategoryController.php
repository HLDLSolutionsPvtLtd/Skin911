<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function all()
    {
        return Category::all();
    }

    public function create(Request $request)
    {
        $path = '';
        $validated = $request->validate([
            'name' => 'required'
        ]);
        if($request->image)
        {
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
        }
        Category::create([
            'name' => $request->name,
            'img' => $path
        ]);

        return redirect()->back();
    }

    public function update(Category $category, Request $request)
    {
        $category->name = $request->name;
        if($category->image)
        {
            Storage::disk('public')->delete($category->img);
        }
        if($request->image)
        {
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
            $category->img = $path;
        }
        $category->save();

        return redirect()->back();

    }

    public function delete(Category $category)
    {
        if($category->image)
        {
            Storage::disk('public')->delete($category->img);
        }
        $category->delete();

        return response('success', 200);

    }
}
