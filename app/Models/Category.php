<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $with = ['discounts'];
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable')->where('valid_from', '<=', Carbon::now()->format('Y-m-d'))->where('valid_upto', '>=', Carbon::now()->format('Y-m-d'));
    }
}
