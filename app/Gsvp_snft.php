<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvp_snft extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shk',
        'np',
        'fg',
        'td',
        'ad',
        'ras',
        'ts',
        'tq',
        'tam',
        'kl',
        'tk',
        'kk',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
