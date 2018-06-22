<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    protected $data = [];
    protected $isSuperAdmin = false;

    public function __construct()
    {
        if (\Auth::check()) {
            \Auth::user()->group->menus;
        }
        $this->isSuperAdmin = (\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false);
    }

    protected function hasPermissionOnMenu($menu, $action)
    {
        if ($this->isSuperAdmin) return true;

        $name = strtolower($menu);
        $permissions = \Session::get('permissions');
        $action = strtolower($action);
        if (($action == 'create') || ($action == 'c')) {
            $action = 'create';
        } elseif (($action == 'read') || ($action == 'r')) {
            $action = 'read';
        } elseif (($action == 'delete') || ($action == 'd')) {
            $action = 'delete';
        } elseif (($action == 'update') || ($action == 'u')) {
            $action = 'update';
        }
//        var_dump($action);
        $result = false;
        foreach ($permissions as $permission) {
            if ($permission->menu->name == $name) {
                if ($permission->$action == 1) {
                    $result = true;
                    break;
                }
            }
        }
        return $result;
    }
}
