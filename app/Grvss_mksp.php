<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grvss_mksp extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datatime',
        'sh',
        'm',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
