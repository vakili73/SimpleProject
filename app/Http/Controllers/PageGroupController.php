<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageGroupController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'group';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'group_id' => [
                'alias' => 'نام',
                'class' => \App\Group::class,
                'wherethrough' => [
                    'key' => 'name',
                    'value' => 'id'
                ]
            ],
            'menu_id' => [
                'alias' => 'دسترسی',
                'class' => \App\Menu::class,
                'wherethrough' => [
                    'key' => 'alias',
                    'value' => 'id'
                ]
            ],
            'create' => [
                'alias' => 'ایجاد',
                'class' => \App\Permission::class
            ],
            'read' => [
                'alias' => 'نمایش',
                'class' => \App\Permission::class
            ],
            'delete' => [
                'alias' => 'حذف',
                'class' => \App\Permission::class
            ],
            'update' => [
                'alias' => 'ویرایش',
                'class' => \App\Permission::class
            ]
        ];

        // User has grant filed in database for this reason grant control is true
        $group = \Auth::user()->group;
        $grant = $group->grant;
        $data['groupGrant'] = $grant;
        $has_grant_control = true;

        if ($this->isSuperAdmin) {
            $has_grant_control = false;
        }

        $data['data']['info'] = LibFilter::Rendering(\App\Permission::class, $columnsInfo, $params['search'], $params['perPage'],
            $has_grant_control, $grant);
        $data['data']['info']->setPath('/group');
//        \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
        $data['params'] = $params;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        global $data;
        $permOnMenu = 'Group';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $data['data']['load']['home'] = \App\Home::all();
            $data['data']['load']['menu'] = \App\Menu::all();
            $this->load($data, ['perPage' => 5, 'search' => $request->search]);
            return view('pages.group', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $group = \Auth::user()->group;
            $data['data']['load']['menu'] = $group->menus;
            $this->load($data, ['perPage' => 5, 'search' => $request->search]); // Only grant Check
            return view('pages.group', $data);
        } else {
            abort(503);
        }
    }

    private function groupCan($action)
    {
        if (!$this->isSuperAdmin) {
            $result = true;
            $action = strtolower($action);
            if (($action == 'create') || ($action == 'c')) {
                if (!$this->hasPermissionOnMenu('Group', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن گروه جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Group', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن گروه از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Group', $action)) {
                    \Session::flash('warning', ['شما دسترسی ویرایش گروه را ندارید.']);
                    $result = false;
                }
            }
            return $result;
        } else {
            return true;
        }
    }

    public function postCreate(Request $request)
    {

        if (!$this->groupCan('Create')) {
            return $this->getIndex($request);
        }

        $this->validate($request, [
            'name' => 'required:45|unique:groups',
            'home' => 'numeric',
            'menu' => 'array',
            'create' => 'array',
            'read' => 'array',
            'delete' => 'array',
            'update' => 'array',
        ]);

        foreach ($request->menu as $item) {
            $temp = new Request();
            $temp->offsetSet('menu', $item);

            $this->validate($temp, ['menu' => 'numeric|required']);
        }

        $group = \Auth::user()->group;
        $home = $group->home->id;
        if ($this->isSuperAdmin) {
            $home = $request->home;
        }

        $group = new \App\Group;
        $group->name = $request->name;
        $group->home_id = $home;

        $Grant = null;
        $grant = \Auth::user()->grant;
        $subGrant = \App\Group::where('grant', 'LIKE', $grant . '%')->get();
        if ($subGrant->count() == 1) { // only it self
            $Grant = $grant . ',1';
            $group->grant = $Grant;
        } else {
            $max = 0;
            $subGrant = $subGrant->pluck(['grant']);
            foreach ($subGrant as $subG) {
                $subG = explode(',', $subG);
                $num = (int)$subG[count($subG) - 1];
                $max = $num > $max ? $num : $max;
            }
            $Grant = $grant . ',' . ++$max;
            $group->grant = $Grant;
        }

        $result = $group->save();

        $group->menus()->sync($request->menu);

        $i = 0;
        $permissions = array();
        $perms = $this->isSuperAdmin ? null : \Session::get('permissions')->keyBy('menu_id');
        $perm = array();
        foreach ($request->menu as $item) {
            if (!$this->isSuperAdmin) $perm = $perms->all()[$item];
            $permission = new \App\Permission;
            $permission->group_id = \App\Group::where('name', $group->name)->get()->first()->id;
            $permission->menu_id = $item;
            $permission->grant = $Grant;
            if ($this->isSuperAdmin || $perm['create']) $permission->create = $request->create[$i];
            if ($this->isSuperAdmin || $perm['read']) $permission->read = $request->read[$i];
            if ($this->isSuperAdmin || $perm['delete']) $permission->delete = $request->delete[$i];
            if ($this->isSuperAdmin || $perm['update']) $permission->update = $request->update[$i];
            $i++;
            array_push($permissions, $permission);
        }

        $group->permissions()->saveMany(array_values($permissions));

        if ($result == 1) {
            $request->session()->flash('success', ["گروه $group->name با موفقیت به جمع گروه ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن گروه $group->name با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }

        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->groupCan('Delete')) {
                echo 2;
            } else {
                $group = \App\Group::where('name', $request->group)->get()->first();
                $menu = \App\Menu::where('alias', $request->permission)->get()->first();
                $result = \DB::delete('DELETE FROM groups_has_menus WHERE group_id = ? AND menu_id = ? LIMIT 1', [$group->id, $menu->id]);
                if ($result != 0) {
                    $permissions = $group->permissions;
                    foreach ($permissions as $item) {
                        if ($item->menu->alias == $request->permission) {
                            $result = $item->delete();
                            break;
                        }
                    }
                }
                $flag = \App\Permission::where('group_id', $group->id)->where('menu_id', $menu->id)->get()->isEmpty();
                if ($result != 0 && $group->menus->isEmpty() && $flag && $group->users->isEmpty()) {
                    $result = $group->delete();
                }
                echo $result;
            }
        } else {
            return response('Unauthorized.', 401);
        }
    }

    public function postUpdate(Request $request)
    {
        if (!$this->groupCan('Create')) {
            return $this->getIndex($request);
        }

        if ($request->old_name == $request->name) {
            $this->validate($request, [
                'home' => 'numeric',
                'menu' => 'array',
                'create' => 'array',
                'read' => 'array',
                'delete' => 'array',
                'update' => 'array',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required:45|unique:groups',
                'home' => 'numeric',
                'menu' => 'array',
                'create' => 'array',
                'read' => 'array',
                'delete' => 'array',
                'update' => 'array',
            ]);
        }

        foreach ($request->menu as $item) {
            $temp = new Request();
            $temp->offsetSet('menu', $item);

            $this->validate($temp, ['menu' => 'numeric|required']);
        }

        $old_name = $request->old_name;

        $result = null;
        $group = \App\Group::where('name', $old_name)->get()->first();
        if ($this->isSuperAdmin) {
            $group->name = $request->name;
            $group->home_id = $request->home;
            $result = $group->save();
        } else {
            $group->name = $request->name;
            $result = $group->save();
        }

        if ($result == 1) {
            $perm = array();
            $perms = \Session::get('permissions')->keyBy('menu_id');
            if (!$this->isSuperAdmin) $perm = $perms->all()[$request->menu[0]];
            $permision = \App\Permission::where('group_id', $group->id)->where('menu_id', $request->menu[0])->get()->first();
            if ($this->isSuperAdmin || $perm['create']) $permision->create = $request->create[0];
            if ($this->isSuperAdmin || $perm['read']) $permision->read = $request->read[0];
            if ($this->isSuperAdmin || $perm['delete']) $permision->delete = $request->delete[0];
            if ($this->isSuperAdmin || $perm['update']) $permision->update = $request->update[0];

            $result = $permision->save();
        }

        if ($result == 1) {
            $request->session()->flash('information', ["بروز رسانی با موفقیت انجام شد."]);
        } else {
            $request->session()->flash('warning', ["بروز رسانی با شکست رو به رو شد."]);
        }

        return $this->getIndex($request);
    }
}
