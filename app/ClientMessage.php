<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMessage extends Model
{
    protected $fillable = [
        'fname',
        'email',
        'subject',
        'msg',
        'client_upload_file',
    ];
}
