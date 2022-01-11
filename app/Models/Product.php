<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['brand', 'category', 'variant', 'image'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function variant()
    {
        return $this->hasMany(Variant::class, 'product_id');
    }
}
