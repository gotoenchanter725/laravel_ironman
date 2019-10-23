<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'payment_status'
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetails');
    }

    public function billing()
    {
        return $this->hasOne('App\Billing', 'id', 'billing_id');
    }

    public function shipping()
    {
        return $this->hasOne('App\Shipping', 'id', 'shipping_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne('App\PaymentMethod', 'id', 'payment_method');
    }
}
