<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DiscountController extends Controller
{
    public function all()
    {
        return Discount::all()->load(['brands', 'categories', 'products'])->where('valid_from', '<=', Carbon::now())->where('valid_upto', '>=', Carbon::now());
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

    public function detachProduct(Discount $discount, Request $request)
    {
        if($request->data['type'] == 'product')
        {
            $discount->products()->detach($request->data['data']['id']);
        }
        elseif($request->data['type'] == 'category')
        {
            $discount->categories()->detach($request->data['data']['id']);
        }
        else
        {
            $discount->brands()->detach($request->data['data']['id']);
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
        $discount->valid_from = $request->valid_from;
        $discount->valid_upto = $request->valid_upto;

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

    public function delete(Discount $discount, Request $request)
    {
        foreach($discount->products as $item)
        {
            $discount->products()->detach($item);
        }
    
        foreach($discount->categories as $item)
        {
            $discount->categories()->detach($item);
        }
    
        foreach($discount->brands as $item)
        {
            $discount->brands()->detach($item);
        }

        $discount->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $discounts = Discount::where('name', 'like', "%$request->key%")->get();
        return Inertia::render('Admin/Discount', ['discounts' => $discounts]);
    }

}
