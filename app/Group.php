<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'home_id',
        'grant',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function home() {
        return $this->belongsTo('App\Home');
    }

    public function users() {
        return $this->hasMany('App\User');
    }

    public function permissions() {
        return $this->hasMany('App\Permission');
    }

    public function menus() {
        return $this->belongsToMany('App\Menu','groups_has_menus')->orderBy('order', 'asc');
    }

}
