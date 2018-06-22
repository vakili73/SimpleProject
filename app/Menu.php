<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
        'icon',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function groups() {
        return $this->belongsToMany('App\Group', 'groups_has_menus')->orderBy('order', 'asc');
    }

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

}
