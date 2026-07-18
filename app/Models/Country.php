<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $fillable = [

        'name',

        'iso_code',

        'region'

    ];

    public function economicData(): HasMany
{
    return $this->hasMany(EconomicData::class);
}

public function weatherLogs(): HasMany
{
    return $this->hasMany(WeatherLog::class);
}

public function newsCaches(): HasMany
{
    return $this->hasMany(NewsCache::class);
}

public function ports(): HasMany
{
    return $this->hasMany(Port::class);
}

public function riskEvents(): HasMany
{
    return $this->hasMany(RiskEvent::class);
}

public function riskScores(): HasMany
{
    return $this->hasMany(RiskScore::class);
}


}
