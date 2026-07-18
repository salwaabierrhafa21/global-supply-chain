<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherLog extends Model
{
    protected $fillable = [

        'country_id',

        'temperature',

        'humidity',

        'weather_condition',

        'wind_speed',

        'recorded_at'

    ];

    public function country(): BelongsTo
{
    return $this->belongsTo(Country::class);
}
}
