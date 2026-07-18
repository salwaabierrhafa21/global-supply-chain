<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingRoute extends Model
{
    protected $fillable = [

        'origin_port_id',

        'destination_port_id',

        'distance',

        'estimated_days',

        'status'

    ];
}
