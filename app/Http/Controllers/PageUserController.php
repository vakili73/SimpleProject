<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageUserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'user';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'name' => [
                'alias' => 'نام',
                'class' => \App\User::class
            ],
            'family' => [
                'alias' => 'نام خانوادگی',
                'class' => \App\User::class
            ],
            'username' => [
                'alias' => 'نام کاربری',
                'class' => \App\User::class
            ],
            'position' => [
                'alias' => 'سمت',
                'class' => \App\User::class
            ],
            'state' => [
                'alias' => 'وضعیت',
                'class' => \App\User::class
            ],
            'group_id' => [
                'alias' => 'گروه کاربری',
                'class' => \App\Group::class,
                'wherethrough' => [
                    'key' => 'name',
                    'value' => 'id'
                ]
            ]
        ];

        // User has grant filed in database for this reason grant control is true
        $grant = \Auth::user()->grant;
        $has_grant_control = true;

        if ($this->isSuperAdmin) {
            $has_grant_control = false;
        }

        $data['user']['info'] = LibFilter::Rendering(\App\User::class, $columnsInfo, $params['search'], $params['perPage'],
            $has_grant_control, $grant);
        $data['user']['info']->setPath('/user');
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
        $permOnMenu = 'User';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $data['user']['load']['group'] = \App\Group::all();
            $this->load($data, ['perPage' => 5, 'search' => $request->search]);
            return view('pages.user', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $grant = \Auth::user()->grant;
            $data['user']['load']['group'] = \App\Group::where('grant', 'LIKE', $grant . '%')->get();
            $this->load($data, ['perPage' => 5, 'search' => $request->search]); // Only grant Check
            return view('pages.user', $data);
        } else {
            abort(503);
        }
    }

    private function userCan($action)
    {
        if (!$this->isSuperAdmin) {
            $result = true;
            $action = strtolower($action);
            if (($action == 'create') || ($action == 'c')) {
                if (!$this->hasPermissionOnMenu('User', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن کاربر جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('User', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن کاربر از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('User', $action)) {
                    \Session::flash('warning', ['شما دسترسی ویرایش کاربری را ندارید.']);
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
        if (!$this->userCan('Create')) {
            return $this->getIndex($request);
        }

        $this->validate($request, [
            'name' => 'required:45',
            'family' => 'required:45',
            'username' => 'required:45 | unique:users',
            'position' => 'required:45',
            'password' => 'required | confirmed | min:6',
            'state' => 'required',
            'group' => 'required'
        ]);

        $user = new \App\User;
        $user->name = $request->name;
        $user->family = $request->family;
        $user->username = $request->username;
        $user->position = $request->position;
        $user->password = bcrypt($request->password);
        $user->state = $request->state;
        $user->group_id = $request->group;

        $grant = \Auth::user()->grant;
        $subGrant = \App\User::where('grant', 'LIKE', $grant . '%')->get();
        if ($subGrant->count() == 1) { // only it self
            $user->grant = $grant . ',1';
        } else {
            $max = 0;
            $subGrant = $subGrant->pluck(['grant']);
            foreach ($subGrant as $subG) {
                $subG = explode(',', $subG);
                $num = (int)$subG[count($subG) - 1];
                $max = $num > $max ? $num : $max;
            }
            $user->grant = $grant . ',' . ++$max;
        }

        $result = $user->save();

        if ($result == 1) {
            $request->session()->flash('success', ["کاربر $user->username با موفقیت به جمع کاربران پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن کاربر $user->username با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }

        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->userCan('Delete')) {
                echo 2;
            } else {
                echo \App\User::where('username', $request->username)->delete();
            }
        } else {
            return response('Unauthorized.', 401);
        }
    }

    public function postUpdate(Request $request)
    {

        if (!$this->userCan('Update')) {
            return $this->getIndex($request);
        }

        if ($request->old_username == $request->username) {
            $this->validate($request, [
                'name' => 'required:45',
                'family' => 'required:45',
                'username' => 'required:45',
                'position' => 'required:45',
                'password' => 'required | confirmed | min:6',
                'state' => 'required',
                'group' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required:45',
                'family' => 'required:45',
                'username' => 'required:45 | unique:users',
                'position' => 'required:45',
                'password' => 'required | confirmed | min:6',
                'state' => 'required',
                'group' => 'required'
            ]);
        }

        $result = \App\User::where('username', $request->old_username)
            ->update([
                'name' => $request->name,
                'family' => $request->family,
                'username' => $request->username,
                'position' => $request->position,
                'password' => bcrypt($request->password),
                'state' => $request->state,
                'group_id' => $request->group,
            ]);

        if ($result == 1) {
            $request->session()->flash('information', ["بروز رسانی با موفقیت انجام شد."]);
        } else {
            $request->session()->flash('warning', ["بروز رسانی با شکست رو به رو شد."]);
        }

        return $this->getIndex($request);
    }
}
