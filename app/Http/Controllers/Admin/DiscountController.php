<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DiscountController extends Controller
{
    public function all()
    {
        return Discount::all();
    }

    public function attachProduct(Discount $discount, Request $request)
    {
        if($request->type == 'products')
        {
            foreach($request->items as $item)
            {
                $discount->products()->attach($item);
            }
        }
        elseif($request->type == 'categories')
        {
            foreach($request->items as $item)
            {
                $discount->categories()->attach($item);
            }
        }
        else
        {
            foreach($request->items as $item)
            {
                $discount->brands()->attach($item);
            }
        }
        return redirect()->back();
    }
    public function create(Request $request)
    {
        $path = '';
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'amount'=> 'required',
            'valid_from' => 'required|date',
            'valid_upto' => 'required|date'
        ]);
        if($request->image)
        {
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
        }

        Discount::create(
            array_merge(
                $validated,
                ['img' => $path]
            )
        );

        return redirect()->back();
    }

    public function update(Discount $discount, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'valid_from' => 'required|date',
            'valid_upto' => 'required|date'
        ]);
        $discount->name = $request->name;
        $discount->type = $request->type;
        $discount->amount = $request->amount;
        if($request->image)
        {
            if($discount->image)
            {
                Storage::disk('public')->delete($discount->img);
            }
            $path = $request->image->storeAs('media', Str::uuid() . '.' . $request->image->getClientOriginalExtension(), [ 'disk'=> 'public']);
            $discount->img = $path;
        }

        $discount->save();
        return redirect()->back();
    }

}
