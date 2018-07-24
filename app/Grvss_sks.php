<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grvss_sks extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datatime',
        'shift',
        'kf',
        'sshk',
        'spk',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
}
