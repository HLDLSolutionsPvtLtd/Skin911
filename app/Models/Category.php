<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['discounts'];
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable');
    }
}
