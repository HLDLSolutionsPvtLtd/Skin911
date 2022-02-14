<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //
    public function getRand()
    {
        return Discount::all()->random(1)->first();
    }

    public function checkPop(Request $request)
    {
        if($request->session()->has('poped') && $request->session()->get('poped'))
        {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }

    public function updatePop(Request $request)
    {
        $request->session()->put('poped', $request->val);
        return response('success', 200);
    }
}
