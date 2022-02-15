<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //
    public function getRand()
    {
        return Discount::where('valid_from', '<', Carbon::now())->where('valid_upto', '>', Carbon::now())->get()->random(1);
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
