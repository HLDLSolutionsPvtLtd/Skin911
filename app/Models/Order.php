<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['products', 'transaction'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'variant', 'subtotal']);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id');
    }
}
