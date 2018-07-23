<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gsvbb_mmr extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'msh',
        'mt',
        'rl',
        'apm',
        'nh',
        'makd',
        'n',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
