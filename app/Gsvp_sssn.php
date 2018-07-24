<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvp_sssn extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shp',
        's',
        'sp',
        'np',
        'tz',
        'rp',
        'mt',
        'mz',
        'a',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
