<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $fillable = [

        'country_id',

        'port_name',

        'city',

        'status'

    ];
}
