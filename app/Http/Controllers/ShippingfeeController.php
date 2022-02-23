<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShippingfeeController extends Controller
{
    public function index(){
        return Shipping::all();
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'pincode' => 'nullable',
            'fee'   => 'required',
        ]);

        Shipping::create($validated);

        return redirect()->back();
    }

    public function update(Shipping $shipping, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'pincode' => 'required',
            'fee'   => 'required',
        ]);

        $shipping->update($validated);

        return redirect()->back();
    }

    public function delete(Shipping $shipping)
    {
        $shipping->delete();

        return redirect()->back();
    }

    public function calculate(Request $request)
    {
        $free = Shipping::where('name', 'free')->first();

        if($free < $request->amount)
        {
            return 0;
        }
        else
        {
            $fee = Shipping::where('pincode', $request->pincode)->first();
            if($fee)
            {
                return $fee->fee;
            }
            else
            {
                $fee = Shipping::where('name', 'Default')->first();
                return $fee->fee;
            }
        }
    }

    public function search(Request $request)
    {
        $fees = Shipping::where('name', 'like', "%$request->key%")->orWhere('pincode', 'like',  "%$request->key%")->get();

        return Inertia::render('Admin/Shipping', ['fees' => $fees]);
    }
}
