<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'group_id',
        'grant',
        'create',
        'read',
        'delete',
        'update',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

}
