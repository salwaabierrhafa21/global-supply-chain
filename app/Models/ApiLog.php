<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    protected $fillable = [

        'api_name',

        'endpoint',

        'request_method',

        'status_code',

        'status',

        'message',

        'requested_at'

    ];
}
