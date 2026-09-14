<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    /**
     * Ebben a projektben nem használunk timestamp mezőket.
     */
    public $timestamps = false;

    /**
     * Tömegesen kitölthető mezők.
     */
    protected $fillable = ['name', 'coatofarms'];

    /**
     * Egy megyéhez több város tartozhat.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
