<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Port extends Model
{
    protected $fillable = [

        'country_id',

        'port_name',

        'city',

        'port_code',

        'latitude',

        'longitude',

        'status'

    ];

    /**
     * Relasi ke Negara
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Jalur sebagai pelabuhan asal
     */
    public function originRoutes(): HasMany
    {
        return $this->hasMany(
            ShippingRoute::class,
            'origin_port_id'
        );
    }

    /**
     * Jalur sebagai pelabuhan tujuan
     */
    public function destinationRoutes(): HasMany
    {
        return $this->hasMany(
            ShippingRoute::class,
            'destination_port_id'
        );
    }
}