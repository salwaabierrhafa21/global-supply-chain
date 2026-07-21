<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
        'country_code',
        'currency_code',
        'region',
        'latitude',
        'longitude',
        'is_active',
    ];

    /**
     * Relasi ke data ekonomi
     */
    public function economicData()
    {
        return $this->hasMany(EconomicData::class);
    }
}