<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvbb_sat extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shk',
        'kt',
        'khn',
        'kgp',
        'krm',
        'kp',
        'ksh',
        'kcpk',
        'ko',
        'ktt',
        'qb',
        'nk',
        'tt',
        'kv',
        'kk',
        'kg',
        'ofb',
        'ts',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
