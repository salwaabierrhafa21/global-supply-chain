<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    protected $fillable = [

        'base_currency',

        'target_currency',

        'exchange_rate',

        'recorded_at'

    ];
}
