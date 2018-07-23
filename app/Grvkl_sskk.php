<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grvkl_sskk extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shift',
        'shk',
        'kvk',
        'kch',
        'ka',
        'rm',
        'kr',
        't',
        'nk',
        'kk',
        'qb',
        'nsh',
        'b',
        'm',
        'a',
        'mla',
        'ql',
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
