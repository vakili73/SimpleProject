<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use App\Http\Libraries\GregorianDateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageGrvklController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'grvkl';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grvkl_sssn::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grvkl_sssn::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Grvkl_sssn::class
            ],
            's' => [
                'alias' => 'سایز',
                'class' => \App\Grvkl_sssn::class
            ],
            'nt' => [
                'alias' => 'نام طرح',
                'class' => \App\Grvkl_sssn::class
            ],
            'mt' => [
                'alias' => 'متراژ تولید',
                'class' => \App\Grvkl_sssn::class
            ],
            'ka' => [
                'alias' => 'کد انگوب',
                'class' => \App\Grvkl_sssn::class
            ],
            'kl' => [
                'alias' => 'کد لعاب',
                'class' => \App\Grvkl_sssn::class
            ],
            'tv' => [
                'alias' => 'تعداد واگن',
                'class' => \App\Grvkl_sssn::class
            ],
            'mz' => [
                'alias' => 'مقدار ضایعات',
                'class' => \App\Grvkl_sssn::class
            ],
            'avm' => [
                'alias' => 'علت و محل',
                'class' => \App\Grvkl_sssn::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grvkl_sssn::class
            ],
        ];

        $data['params'] = '';
        if ($params['search'][0] == 'search'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data']['info'] = LibFilter::Rendering(\App\Grvkl_sssn::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search' ? $data['data']['info']->setPath('/grvkl') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grvkl_sskk::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grvkl_sskk::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Grvkl_sskk::class
            ],
            'kvk' => [
                'alias' => 'کمبود واگن خام',
                'class' => \App\Grvkl_sskk::class
            ],
            'kch' => [
                'alias' => 'کاشی چرخان',
                'class' => \App\Grvkl_sskk::class
            ],
            'ka' => [
                'alias' => 'کابین آب',
                'class' => \App\Grvkl_sskk::class
            ],
            'rm' => [
                'alias' => 'رولر ماتیک',
                'class' => \App\Grvkl_sskk::class
            ],
            'kr' => [
                'alias' => 'خرابی روتو',
                'class' => \App\Grvkl_sskk::class
            ],
            't' => [
                'alias' => 'خ.د تعمیرات',
                'class' => \App\Grvkl_sskk::class
            ],
            'nk' => [
                'alias' => 'خ.د نظافت خودکار',
                'class' => \App\Grvkl_sskk::class
            ],
            'kk' => [
                'alias' => 'کنترل کیفی',
                'class' => \App\Grvkl_sskk::class
            ],
            'qb' => [
                'alias' => 'قطع برق',
                'class' => \App\Grvkl_sskk::class
            ],
            'nsh' => [
                'alias' => 'نظافت و شست و شو',
                'class' => \App\Grvkl_sskk::class
            ],
            'b' => [
                'alias' => 'تعمیرات برق',
                'class' => \App\Grvkl_sskk::class
            ],
            'm' => [
                'alias' => 'تعمیرات مکانیک',
                'class' => \App\Grvkl_sskk::class
            ],
            'a' => [
                'alias' => 'تعمیرات الکترونیک',
                'class' => \App\Grvkl_sskk::class
            ],
            'mla' => [
                'alias' => 'مشکل لعاب و انگوب',
                'class' => \App\Grvkl_sskk::class
            ],
            'ql' => [
                'alias' => 'قوس و لامینه',
                'class' => \App\Grvkl_sskk::class
            ],
            'ts' => [
                'alias' => 'تغییر سایز',
                'class' => \App\Grvkl_sskk::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grvkl_sskk::class
            ],
        ];

        if ($params['search'][0] == 'search1'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data1']['info'] = LibFilter::Rendering(\App\Grvkl_sskk::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search1' ? $data['data1']['info']->setPath('/grvkl') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grvkl_saaa::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grvkl_saaa::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Grvkl_saaa::class
            ],
            'apk' => [
                'alias' => 'اپراتور کابین',
                'class' => \App\Grvkl_saaa::class
            ],
            'apc' => [
                'alias' => 'اپراتور چاپ',
                'class' => \App\Grvkl_saaa::class
            ],
            'apr' => [
                'alias' => 'اپراتور رولرماتیک',
                'class' => \App\Grvkl_saaa::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grvkl_saaa::class
            ],
        ];

        if ($params['search'][0] == 'search2'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data2']['info'] = LibFilter::Rendering(\App\Grvkl_saaa::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search2' ? $data['data2']['info']->setPath('/grvkl') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grvkl_smms::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grvkl_smms::class
            ],
            'mng' => [
                'alias' => 'م نمونه گیری',
                'class' => \App\Grvkl_smms::class
            ],
            'mt' => [
                'alias' => 'م ترانسفر',
                'class' => \App\Grvkl_smms::class
            ],
            'ssh' => [
                'alias' => 'سر شیفت',
                'class' => \App\Grvkl_smms::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grvkl_smms::class
            ],
        ];

        if ($params['search'][0] == 'search3'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data3']['info'] = LibFilter::Rendering(\App\Grvkl_smms::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search3' ? $data['data3']['info']->setPath('/grvkl') : null;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        global $data;
        $permOnMenu = 'Grvkl';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]);
            return view('pages.grvkl', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]); // Only grant Check
            return view('pages.grvkl', $data);
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
                if (!$this->hasPermissionOnMenu('Grvkl', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن مورد جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Grvkl', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن مورد از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Grvkl', $action)) {
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
        if($request->action == 'create_sssn'){

            $this->validate($request, [
                'shift' => 'required',
            ]);
    
            $grvkl_sssn = new \App\Grvkl_sssn;
            $grvkl_sssn->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grvkl_sssn->shift = $request->shift;
            $grvkl_sssn->shk = $request->shk;
            $grvkl_sssn->s = $request->s;
            $grvkl_sssn->nt = $request->nt;
            $grvkl_sssn->mt = $request->mt;
            $grvkl_sssn->ka = $request->ka;
            $grvkl_sssn->kl = $request->kl;
            $grvkl_sssn->tv = $request->tv;
            $grvkl_sssn->mz = $request->mz;
            $grvkl_sssn->avm = $request->avm;
            $grvkl_sssn->description = $request->description;
            
            $result = $grvkl_sssn->save();
            $grvkl = $grvkl_sssn;

            // SSKK MODEL
        } else if ($request->action == 'create_sskk'){

            $this->validate($request, [
                'shift' => 'required',
            ]);
    
            $grvkl_sskk = new \App\Grvkl_sskk;
            $grvkl_sskk->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grvkl_sskk->shift = $request->shift;
            $grvkl_sskk->shk = $request->shk;
            $grvkl_sskk->kvk = $request->kvk;
            $grvkl_sskk->kch = $request->kch;
            $grvkl_sskk->ka = $request->ka;
            $grvkl_sskk->rm = $request->rm;
            $grvkl_sskk->kr = $request->kr;
            $grvkl_sskk->t = $request->t;
            $grvkl_sskk->nk = $request->nk;
            $grvkl_sskk->kk = $request->kk;
            $grvkl_sskk->qb = $request->qb;
            $grvkl_sskk->nsh = $request->nsh;
            $grvkl_sskk->b = $request->b;
            $grvkl_sskk->m = $request->m;
            $grvkl_sskk->a = $request->a;
            $grvkl_sskk->mla = $request->mla;
            $grvkl_sskk->ql = $request->ql;
            $grvkl_sskk->ts = $request->ts;
            $grvkl_sskk->description = $request->description;

            $result = $grvkl_sskk->save();
            $grvkl = $grvkl_sskk;

            // SAAA MODEL
        } else if ($request->action == 'create_saaa'){

            $this->validate($request, [
                'shift' => 'required',
            ]);
    
            $grvkl_saaa = new \App\Grvkl_saaa;
            $grvkl_saaa->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $grvkl_saaa->shift = $request->shift;
            $grvkl_saaa->shk = $request->shk;
            $grvkl_saaa->apk = $request->apk;
            $grvkl_saaa->apc = $request->apc;
            $grvkl_saaa->apr = $request->apr;
            $grvkl_saaa->description = $request->description;

            $result = $grvkl_saaa->save();
            $grvkl = $grvkl_saaa;

            // SMMS MODEL
        } else if ($request->action == 'create_smms'){

        $this->validate($request, [
            'shift' => 'required',
        ]);

        $grvkl_smms = new \App\Grvkl_smms;
        $grvkl_smms->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
        $grvkl_smms->shift = $request->shift;
        $grvkl_smms->mng = $request->mng;
        $grvkl_smms->mt = $request->mt;
        $grvkl_smms->ssh = $request->ssh;
        $grvkl_smms->description = $request->description;

        $result = $grvkl_smms->save();
        $grvkl = $grvkl_smms;

    }

        if ($result == 1) {
            $request->session()->flash('success', ["مورد $grvkl->id با موفقیت به جمع مورد ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن مورد $grvkl->id با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }
        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->userCan('Delete')) {
                echo 2;
            } else {
                if ($request->action == 'delete_sssn'){
                    echo \App\Grvkl_sssn::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_sskk'){
                    echo \App\Grvkl_sskk::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_saaa'){
                    echo \App\Grvkl_saaa::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_smms'){
                    echo \App\Grvkl_smms::where('id', $request->id)->delete();
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
        
        if ($request->action == 'update_sssn'){
            $this->validate($request, [
                'shift' => 'required',
            ]);
    
            $result = \App\Grvkl_sssn::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shift' => $request->shift,
                    'shk' => $request->shk,
                    's' => $request->s,
                    'nt' => $request->nt,
                    'mt' => $request->mt,
                    'ka' => $request->ka,
                    'kl' => $request->kl,
                    'tv' => $request->tv,
                    'mz' => $request->mz,
                    'avm' => $request->avm,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_sskk'){
            $result = \App\Grvkl_sskk::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shift' => $request->shift,
                    'shk' => $request->shk,
                    'kvk' => $request->kvk,
                    'kch' => $request->kch,
                    'ka' => $request->ka,
                    'rm' => $request->rm,
                    'kr' => $request->kr,
                    't' => $request->t,
                    'nk' => $request->nk,
                    'kk' => $request->kk,
                    'qb' => $request->qb,
                    'nsh' => $request->nsh,
                    'b' => $request->b,
                    'm' => $request->m,
                    'a' => $request->a,
                    'mla' => $request->mla,
                    'ql' => $request->ql,
                    'ts' => $request->ts,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_saaa'){
            $result = \App\Grvkl_saaa::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shift' => $request->shift,
                    'shk' => $request->shk,
                    'apk' => $request->apk,
                    'apc' => $request->apc,
                    'apr' => $request->apr,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_smms'){
            $result = \App\Grvkl_smms::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shift' => $request->shift,
                    'mng' => $request->mng,
                    'mt' => $request->mt,
                    'ssh' => $request->ssh,
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
