<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_breif_description',
        'product_long_description',
        'product_code',
        'product_price',
        'product_stock',
        'alert_quantity',
        'product_image',
        'slug',
        'additional_info',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }

    public function productImage()
    {
        return $this->hasMany('App\ProductImage');
    }
    
}
