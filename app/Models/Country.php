<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [

        'country_name',

        'country_code',

        'currency_code',

        'currency_name',

        'region',

        'language',

        'latitude',

        'longitude',

        'flag',

        'is_active',

    ];

    /**
     * Relasi ke Data Ekonomi
     */
    public function economicData(): HasMany
    {
        return $this->hasMany(EconomicData::class);
    }

    /**
     * Relasi ke Pelabuhan
     */
    public function ports(): HasMany
    {
        return $this->hasMany(Port::class);
    }

    /**
     * Relasi ke Risk Event
     */
    public function riskEvents(): HasMany
    {
        return $this->hasMany(RiskEvent::class);
    }
}