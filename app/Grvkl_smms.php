<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grvkl_smms extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'shift',
        'mng',
        'mt',
        'ssh',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
