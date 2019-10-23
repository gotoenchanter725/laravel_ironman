<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'generated_cart_id',
        'product_id',
        'product_quantity',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
