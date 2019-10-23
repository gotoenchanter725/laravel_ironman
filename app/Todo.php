<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['taskName', 'taskDescription', 'taskStatus'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
