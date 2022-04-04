<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body'  => 'required',
        ]);

        
        Blog::create([
            'title' => $request->title,
            'body'  => $request->body,
        ]);


        return redirect()->back();
    }

    public function update(Blog $blog, Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body'  => 'required',
        ]);

       
        $blog->title = $request->title;
        $blog->body  = $request->body;
        $blog->save();
        


        return redirect()->back();
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect()->back();
    }
}
