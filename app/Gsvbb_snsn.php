<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvbb_snsn extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shk',
        'nkr',
        's',
        'nq',
        'd1s',
        'd1m',
        'd1l',
        'd2s',
        'd2m',
        'd2l',
        'd3',
        'd4',
        'd5',
        'mkt',
        'z',
        'aq',
        'aaa',
        'aks',
        'aas',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
