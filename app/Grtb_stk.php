<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grtb_stk extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shb',
        'tsh',
        'kf',
        'zchs',
        'gss',
        'rs',
        'zcha',
        'gsa',
        'ra',
        'zchh',
        'gsh',
        'rh',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
