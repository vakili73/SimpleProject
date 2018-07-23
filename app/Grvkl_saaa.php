<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grvkl_saaa extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shift',
        'shk',
        'apk',
        'apc',
        'apr',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
