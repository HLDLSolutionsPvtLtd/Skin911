<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Skintype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SkintypesController extends Controller
{
    //
    public function index()
    {
        return Skintype::all();
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
        Skintype::create([
            'name' => $request->name,
            'img' => $path
        ]);

        return redirect()->back();
    }

    public function update(Skintype $Skintype, Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $Skintype->name = $request->name;
        
        if($request->image)
        {
            if($Skintype->image)
            {
                Storage::disk('public')->delete($Skintype->img);
            }
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
            $Skintype->img = $path;
        }
        $Skintype->save();

        return redirect()->back();

    }

    public function delete(Skintype $Skintype)
    {
        if($Skintype->image)
        {
            Storage::disk('public')->delete($Skintype->img);
        }
        $Skintype->delete();

        return response('success', 200);

    }
}
