<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingRoute extends Model
{
    protected $fillable = [

        'origin_port_id',

        'destination_port_id',

        'distance_km',

        'estimated_days',

        'base_cost',

        'status'

    ];

    /**
     * Relasi ke Pelabuhan Asal
     */
    public function originPort(): BelongsTo
    {
        return $this->belongsTo(
            Port::class,
            'origin_port_id'
        );
    }

    /**
     * Relasi ke Pelabuhan Tujuan
     */
    public function destinationPort(): BelongsTo
    {
        return $this->belongsTo(
            Port::class,
            'destination_port_id'
        );
    }
}