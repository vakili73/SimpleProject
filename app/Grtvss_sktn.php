<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grtvss_sktn extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datatime',
        'shift',
        'khbnvn',
        'khbsngsf',
        'khbsngsch',
        'tts',
        'km',
        'kr',
        'kl',
        'n',
        's',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
}
