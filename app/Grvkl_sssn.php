<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grvkl_sssn extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shift',
        'shk',
        's',
        'nt',
        'mt',
        'ka',
        'kl',
        'tv',
        'mz',
        'avm',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
