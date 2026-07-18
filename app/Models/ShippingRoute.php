<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingRoute extends Model
{
    protected $fillable = [

        'origin_port_id',

        'destination_port_id',

        'distance',

        'estimated_days',

        'status'

    ];

    public function originPort(): BelongsTo
{
    return $this->belongsTo(
        Port::class,
        'origin_port_id'
    );
}

public function destinationPort(): BelongsTo
{
    return $this->belongsTo(
        Port::class,
        'destination_port_id'
    );
}
}
