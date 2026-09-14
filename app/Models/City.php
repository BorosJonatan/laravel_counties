<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Ebben a projektben nem használunk timestamp mezőket.
     */
    public $timestamps = false;

    /**
     * Tömegesen kitölthető mezők.
     */
    protected $fillable = [
        'name',
        'zip_code',
        'county_id',
        'population'
    ];

    /**
     * Egy város egy megyéhez tartozik.
     */
    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
