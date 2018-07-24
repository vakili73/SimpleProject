<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grtb_ka extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'ka',
        'shift',
        'kf',
        'sk',
        'tlf',
        'tn',
        'fp',
        'fs',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
