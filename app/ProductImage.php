<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'product_multiple_photo_name',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
