<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCache extends Model
{
    protected $fillable = [

        'country_id',

        'title',

        'description',

        'source',

        'published_at'

    ];

    public function country(): BelongsTo
{
    return $this->belongsTo(Country::class);
}
}