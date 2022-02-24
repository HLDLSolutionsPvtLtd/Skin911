<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body'  => 'required',
            'image' => 'image'
        ]);

        $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
        
        Blog::create([
            'title' => $request->title,
            'body'  => $request->body,
            'image' => $path,
        ]);


        return redirect()->back();
    }

    public function update(Blog $blog, Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body'  => 'required',
        ]);

        if($request->image)
        {
            if($blog->image)
            {
                Storage::disk('public')->delete($blog->img);
            }
           
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
            $blog->title = $request->title;
            $blog->body  = $request->body;
            $blog->image = $path;
            $blog->save();
        }
        else
        {
            $blog->title = $request->title;
            $blog->body  = $request->body;
            $blog->save();
        }
        


        return redirect()->back();
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect()->back();
    }
}
