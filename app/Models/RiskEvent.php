<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiskEvent extends Model
{
    protected $fillable = [

        'country_id',

        'event_type',

        'title',

        'description',

        'severity',

        'source',

        'event_date',

        'status'

    ];
}
