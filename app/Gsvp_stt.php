<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvp_stt extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shk',
        'b',
        'a',
        'm',
        'j',
        's',
        'qb',
        'qg',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
