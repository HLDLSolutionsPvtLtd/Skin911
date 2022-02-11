<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //
    public function getRand()
    {
        return Discount::all()->random(1)->first();
    }
}
