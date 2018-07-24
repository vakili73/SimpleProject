<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use App\Http\Libraries\GregorianDateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageGrtbController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'grtb';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grtb_stk::class
            ],
            'shb' => [
                'alias' => 'شماره بالمیل',
                'class' => \App\Grtb_stk::class
            ],
            'tsh' => [
                'alias' => 'تعداد شارژ',
                'class' => \App\Grtb_stk::class
            ],
            'kf' => [
                'alias' => 'کد فرمول',
                'class' => \App\Grtb_stk::class
            ],
            'zchs' => [
                'alias' => 'زمان چرخش صبح',
                'class' => \App\Grtb_stk::class
            ],
            'gss' => [
                'alias' => 'گلوله سرریز صبح',
                'class' => \App\Grtb_stk::class
            ],
            'rs' => [
                'alias' => 'روانساز صبح',
                'class' => \App\Grtb_stk::class
            ],
            'zcha' => [
                'alias' => 'زمان چرخش عصر',
                'class' => \App\Grtb_stk::class
            ],
            'gsa' => [
                'alias' => 'گلوله سرریز عصر',
                'class' => \App\Grtb_stk::class
            ],
            'ra' => [
                'alias' => 'روانساز عصر',
                'class' => \App\Grtb_stk::class
            ],
            'zchh' => [
                'alias' => 'زمان چرخش شب',
                'class' => \App\Grtb_stk::class
            ],
            'gsh' => [
                'alias' => 'گلوله سرریز شب',
                'class' => \App\Grtb_stk::class
            ],
            'rh' => [
                'alias' => 'روانساز شب',
                'class' => \App\Grtb_stk::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grtb_stk::class
            ],
        ];

        $data['params'] = '';
        if ($params['search'][0] == 'search'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data']['info'] = LibFilter::Rendering(\App\Grtb_stk::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search' ? $data['data']['info']->setPath('/grtb') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grtb_ka::class
            ],
            'ka' => [
                'alias' => 'کارکرد اسپری',
                'class' => \App\Grtb_ka::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grtb_ka::class
            ],
            'kf' => [
                'alias' => 'کدفرمول',
                'class' => \App\Grtb_ka::class
            ],
            'sk' => [
                'alias' => 'ساعت کارکرد',
                'class' => \App\Grtb_ka::class
            ],
            'tlf' => [
                'alias' => 'تعداد لانس فعال',
                'class' => \App\Grtb_ka::class
            ],
            'tn' => [
                'alias' => 'تعداد نازل',
                'class' => \App\Grtb_ka::class
            ],
            'fp' => [
                'alias' => 'فشار پمپ',
                'class' => \App\Grtb_ka::class
            ],
            'fs' => [
                'alias' => 'فشار ساکشن',
                'class' => \App\Grtb_ka::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grtb_ka::class
            ],
        ];

        if ($params['search'][0] == 'search1'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data1']['info'] = LibFilter::Rendering(\App\Grtb_ka::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search1' ? $data['data1']['info']->setPath('/grtb') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grtb_mm::class
            ],
            't' => [
                'alias' => 'عنوان',
                'class' => \App\Grtb_mm::class
            ],
            'c' => [
                'alias' => 'ستون',
                'class' => \App\Grtb_mm::class
            ],
            'v' => [
                'alias' => 'مقدار',
                'class' => \App\Grtb_mm::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grtb_mm::class
            ],
        ];

        if ($params['search'][0] == 'search2'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data2']['info'] = LibFilter::Rendering(\App\Grtb_mm::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search2' ? $data['data2']['info']->setPath('/grtb') : null;
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        global $data;
        $permOnMenu = 'Grtb';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]);
            return view('pages.grtb', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]); // Only grant Check
            return view('pages.grtb', $data);
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
                if (!$this->hasPermissionOnMenu('Grtb', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن مورد جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Grtb', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن مورد از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Grtb', $action)) {
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

        // SSSN MODEL
        if($request->action == 'create_stk'){

            $grtb_stk = new \App\Grtb_stk;
            $grtb_stk->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grtb_stk->shb = $request->shb;
            $grtb_stk->tsh = $request->tsh;
            $grtb_stk->kf = $request->kf;
            $grtb_stk->zchs = $request->zchs;
            $grtb_stk->gss = $request->gss;
            $grtb_stk->rs = $request->rs;
            $grtb_stk->zcha = $request->zcha;
            $grtb_stk->gsa = $request->gsa;
            $grtb_stk->ra = $request->ra;
            $grtb_stk->zchh = $request->zchh;
            $grtb_stk->gsh = $request->gsh;
            $grtb_stk->rh = $request->rh;
            $grtb_stk->description = $request->description;
            
            $result = $grtb_stk->save();
            $grtb = $grtb_stk;

            // SSKK MODEL
        } else if ($request->action == 'create_ka'){

            $grtb_ka = new \App\Grtb_ka;
            $grtb_ka->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grtb_ka->ka = $request->ka;
            $grtb_ka->shift = $request->shift;
            $grtb_ka->kf = $request->kf;
            $grtb_ka->sk = $request->sk;
            $grtb_ka->tlf = $request->tlf;
            $grtb_ka->tn = $request->tn;
            $grtb_ka->fp = $request->fp;
            $grtb_ka->fs = $request->fs;
            $grtb_ka->description = $request->description;
            
            $result = $grtb_ka->save();
            $grtb = $grtb_ka;

            // SAAA MODEL
        } else if ($request->action == 'create_mm'){

            $grtb_mm = new \App\Grtb_mm;
            $grtb_mm->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grtb_mm->t = $request->t;
            $grtb_mm->c = $request->c;
            $grtb_mm->v = $request->v;
            $grtb_mm->description = $request->description;

            $result = $grtb_mm->save();
            $grtb = $grtb_mm;

            // SMMS MODEL
        } 

        if ($result == 1) {
            $request->session()->flash('success', ["مورد $grtb->id با موفقیت به جمع مورد ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن مورد $grtb->id با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }
        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->userCan('Delete')) {
                echo 2;
            } else {
                if ($request->action == 'delete_stk'){
                    echo \App\Grtb_stk::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_ka'){
                    echo \App\Grtb_ka::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_mm'){
                    echo \App\Grtb_mm::where('id', $request->id)->delete();
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
        
        if ($request->action == 'update_stk'){
            $result = \App\Grtb_stk::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shb' => $request->shb,
                    'tsh' => $request->tsh,
                    'kf' => $request->kf,
                    'zchs' => $request->zchs,
                    'gss' => $request->gss,
                    'rs' => $request->rs,
                    'zcha' => $request->zcha,
                    'gsa' => $request->gsa,
                    'ra' => $request->ra,
                    'zchh' => $request->zchh,
                    'gsh' => $request->gsh,
                    'rh' => $request->rh,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_ka'){
            $result = \App\Grtb_ka::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'ka' => $request->ka,
                    'shift' => $request->shift,
                    'kf' => $request->kf,
                    'sk' => $request->sk,
                    'tlf' => $request->tlf,
                    'tn' => $request->tn,
                    'fp' => $request->fp,
                    'fs' => $request->fs,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_mm'){
            $result = \App\Grtb_mm::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    't' => $request->t,
                    'c' => $request->c,
                    'v' => $request->v,
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
