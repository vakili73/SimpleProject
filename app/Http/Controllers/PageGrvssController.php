<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use App\Http\Libraries\GregorianDateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageGrvssController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'grvss';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grvss_sks::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grvss_sks::class
            ],
            'kf' => [
                'alias' => 'کد فرمول',
                'class' => \App\Grvss_sks::class
            ],
            'sshk' => [
                'alias' => 'ساعت شروع کار',
                'class' => \App\Grvss_sks::class
            ],
            'spf' => [
                'alias' => 'ساعت پایان کار',
                'class' => \App\Grvss_sks::class
            ],
        ];

        $data['params'] = '';
        if ($params['search'][0] == 'search'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data']['info'] = LibFilter::Rendering(\App\Grvss_sks::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search' ? $data['data']['info']->setPath('/grvss') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grvss_mksp::class
            ],
            'sh' => [
                'alias' => 'شماره',
                'class' => \App\Grvss_mksp::class
            ],
            'm' => [
                'alias' => 'متراژ',
                'class' => \App\Grvss_mksp::class
            ],
        ];

        if ($params['search'][0] == 'search1'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data1']['info'] = LibFilter::Rendering(\App\Grvss_mksp::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search1' ? $data['data1']['info']->setPath('/grvss') : null;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        global $data;
        $permOnMenu = 'Grvss';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]);
            return view('pages.grvss', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]); // Only grant Check
            return view('pages.grvss', $data);
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
                if (!$this->hasPermissionOnMenu('Grvss', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن مورد جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Grvss', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن مورد از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Grvss', $action)) {
                    \Session::flash('warning', ['شما دسترسی ویرایش مورد را ندارید.']);
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

        if($request->action == 'create_sks'){

            $this->validate($request, [
                'shift' => 'required',
            ]);
    
            $grvss_sks = new \App\Grvss_sks;
            $grvss_sks->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grvss_sks->shift = $request->shift;
            $grvss_sks->kf = $request->kf;
            $grvss_sks->sshk = $request->sshk;
            $grvss_sks->spk = $request->spk;
            $grvss_sks->description = $request->description;
            
            $result = $grvss_sks->save();
            $grvss = $grvss_sks;

        } else if ($request->action == 'create_mksp'){

            $this->validate($request, [
                'sh' => 'required',
            ]);
    
            $grvss_mksp = new \App\Grvss_mksp;
            $grvss_mksp->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grvss_mksp->sh = $request->sh;
            $grvss_mksp->m = $request->m;
            $grvss_mksp->description = $request->description;

            $result = $grvss_mksp->save();
            $grvss = $grvss_mksp;

        }

        if ($result == 1) {
            $request->session()->flash('success', ["مورد $grvss->id با موفقیت به جمع مورد ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن مورد $grvss->id با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }
        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->userCan('Delete')) {
                echo 2;
            } else {
                if ($request->action == 'delete_mksp'){
                    echo \App\Grvss_mksp::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_sks'){
                    echo \App\Grvss_sks::where('id', $request->id)->delete();
                }
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
        
        if ($request->action == 'update_sks'){
            $this->validate($request, [
                'shift' => 'required',
            ]);
    
            $result = \App\Grvss_sks::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shift' => $request->shift,
                    'kf' => $request->kf,
                    'sshk' => $request->sshk,
                    'spk' => $request->spk,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_mksp'){
            $result = \App\Grvss_mksp::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'sh' => $request->sh,
                    'm' => $request->m,
                    'description' => $request->description,
                ]);
        }


        if ($result == 1) {
            $request->session()->flash('information', ["بروز رسانی با موفقیت انجام شد."]);
        } else {
            $request->session()->flash('warning', ["بروز رسانی با شکست رو به رو شد."]);
        }

        return $this->getIndex($request);
    }
}
