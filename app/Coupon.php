<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'coupon_name',
        'added_by',
        'discount_amount',
        'minimum_purchase_amount',
        'validity_till',

    ];
}
