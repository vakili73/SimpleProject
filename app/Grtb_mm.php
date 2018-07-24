<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grtb_mm extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        't',
        'c',
        'v',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
