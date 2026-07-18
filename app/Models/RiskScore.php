<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskScore extends Model
{
    protected $fillable = [

        'country_id',

        'economic_score',

        'weather_score',

        'news_score',

        'logistics_score',

        'final_score',

        'risk_level',

        'calculated_at'

    ];
}
