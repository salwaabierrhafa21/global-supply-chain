<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Port extends Model
{
    protected $fillable = [

        'country_id',

        'port_name',

        'city',

        'status'

    ];

    public function country(): BelongsTo
{
    return $this->belongsTo(Country::class);
}

public function originRoutes(): HasMany
{
    return $this->hasMany(
        ShippingRoute::class,
        'origin_port_id'
    );
}

public function destinationRoutes(): HasMany
{
    return $this->hasMany(
        ShippingRoute::class,
        'destination_port_id'
    );
}
}
