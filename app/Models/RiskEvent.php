<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiskEvent extends Model
{
    use HasFactory;

    protected $fillable = [

        'country_id',

        'event_type',

        'title',

        'description',

        'severity',

        'weather_score',

        'inflation_score',

        'currency_score',

        'news_score',

        'risk_score',

        'source',

        'api_source',

        'event_date',

        'status'

    ];

    /**
     * Relasi ke Country
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}