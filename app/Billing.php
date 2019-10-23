<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'country_id',
        'city_id',
        'order_notes',
    ];
}
