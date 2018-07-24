<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvp_hma extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'h',
        'aa',
        'ts',
        'mn',
        'mam',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
