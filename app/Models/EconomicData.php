<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EconomicData extends Model
{
    protected $fillable = [

        'country_id',

        'gdp',

        'inflation_rate',

        'unemployment_rate',

        'economic_growth',

        'population',

        'exports',

        'imports',

        'recorded_at'

    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}