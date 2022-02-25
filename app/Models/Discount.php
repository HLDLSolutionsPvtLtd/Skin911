<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function brands()
    {
        return $this->morphedByMany(Brand::class, 'discountable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'discountable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'discountable');
    }
}
