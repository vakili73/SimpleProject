<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use App\Http\Libraries\GregorianDateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageGsvbbController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'gsvbb';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvbb_snsn::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Gsvbb_snsn::class
            ],
            'nkr' => [
                'alias' => 'نام و کد رنگ',
                'class' => \App\Gsvbb_snsn::class
            ],
            's' => [
                'alias' => 'سایز',
                'class' => \App\Gsvbb_snsn::class
            ],
            'nq' => [
                'alias' => 'نوع قالب',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd1s' => [
                'alias' => 'درجه ۱ س',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd1m' => [
                'alias' => 'درجه ۱ م',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd1l' => [
                'alias' => 'درجه ۱ ل',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd2s' => [
                'alias' => 'درجه ۲ س',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd2m' => [
                'alias' => 'درجه ۲ م',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd2l' => [
                'alias' => 'درجه ۲ ل',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd3' => [
                'alias' => 'درجه ۳',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd4' => [
                'alias' => 'درجه ۴',
                'class' => \App\Gsvbb_snsn::class
            ],
            'd5' => [
                'alias' => 'درجه ۵',
                'class' => \App\Gsvbb_snsn::class
            ],
            'mkt' => [
                'alias' => 'متراژ کلی تولید',
                'class' => \App\Gsvbb_snsn::class
            ],
            'z' => [
                'alias' => 'ضایعات',
                'class' => \App\Gsvbb_snsn::class
            ],
            'aq' => [
                'alias' => 'عیوب قوس',
                'class' => \App\Gsvbb_snsn::class
            ],
            'aaa' => [
                'alias' => 'عیوب اختلاف ابعاد',
                'class' => \App\Gsvbb_snsn::class
            ],
            'aks' => [
                'alias' => 'عیوب کاهش سایز',
                'class' => \App\Gsvbb_snsn::class
            ],
            'aas' => [
                'alias' => 'عیوب افزایش سایز',
                'class' => \App\Gsvbb_snsn::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvbb_snsn::class
            ],
        ];

        $data['params'] = '';
        if ($params['search'][0] == 'search'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data']['info'] = LibFilter::Rendering(\App\Gsvbb_snsn::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search' ? $data['data']['info']->setPath('/gsvbb') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvbb_sat::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Gsvbb_sat::class
            ],
            'kt' => [
                'alias' => 'خرابی ترانسفر',
                'class' => \App\Gsvbb_sat::class
            ],
            'khn' => [
                'alias' => 'خرابی خط هوایی نوار نقاله',
                'class' => \App\Gsvbb_sat::class
            ],
            'kgp' => [
                'alias' => 'خرابی G&P',
                'class' => \App\Gsvbb_sat::class
            ],
            'krm' => [
                'alias' => 'خرابی رولرماتیک',
                'class' => \App\Gsvbb_sat::class
            ],
            'kp' => [
                'alias' => 'خرابی پرینتر',
                'class' => \App\Gsvbb_sat::class
            ],
            'ksh' => [
                'alias' => 'خرابی شیرینگ',
                'class' => \App\Gsvbb_sat::class
            ],
            'kcpk' => [
                'alias' => 'خرابی CPK',
                'class' => \App\Gsvbb_sat::class
            ],
            'ko' => [
                'alias' => 'خرابی استاکر',
                'class' => \App\Gsvbb_sat::class
            ],
            'ktt' => [
                'alias' => 'خرابی و تعویض تسمه',
                'class' => \App\Gsvbb_sat::class
            ],
            'qb' => [
                'alias' => 'قطع برق',
                'class' => \App\Gsvbb_sat::class
            ],
            'nk' => [
                'alias' => 'نداشتن کارتن',
                'class' => \App\Gsvbb_sat::class
            ],
            'tt' => [
                'alias' => 'تعویض طرح',
                'class' => \App\Gsvbb_sat::class
            ],
            'kv' => [
                'alias' => 'کمبود واگن',
                'class' => \App\Gsvbb_sat::class
            ],
            'kk' => [
                'alias' => 'کنترل کیفی',
                'class' => \App\Gsvbb_sat::class
            ],
            'kg' => [
                'alias' => 'خرابی گاید',
                'class' => \App\Gsvbb_sat::class
            ],
            'ofb' => [
                'alias' => 'افت فشار باد',
                'class' => \App\Gsvbb_sat::class
            ],
            'ts' => [
                'alias' => 'تغییر سایز',
                'class' => \App\Gsvbb_sat::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvbb_sat::class
            ],
        ];

        if ($params['search'][0] == 'search1'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data1']['info'] = LibFilter::Rendering(\App\Gsvbb_sat::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search1' ? $data['data1']['info']->setPath('/gsvbb') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvbb_mmr::class
            ],
            'msh' => [
                'alias' => 'مسیول شیفت',
                'class' => \App\Gsvbb_mmr::class
            ],
            'mt' => [
                'alias' => 'مسیول ترانسفر',
                'class' => \App\Gsvbb_mmr::class
            ],
            'rl' => [
                'alias' => 'راننده لیفتراک',
                'class' => \App\Gsvbb_mmr::class
            ],
            'apm' => [
                'alias' => 'اسامی پرسنل مرخصی',
                'class' => \App\Gsvbb_mmr::class
            ],
            'nh' => [
                'alias' => 'نام همکاران',
                'class' => \App\Gsvbb_mmr::class
            ],
            'makd' => [
                'alias' => 'معایب اثر گذار در کاهش درجه',
                'class' => \App\Gsvbb_mmr::class
            ],
            'n' => [
                'alias' => 'نواقص',
                'class' => \App\Gsvbb_mmr::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvbb_mmr::class
            ],
        ];

        if ($params['search'][0] == 'search2'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data2']['info'] = LibFilter::Rendering(\App\Gsvbb_mmr::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search2' ? $data['data2']['info']->setPath('/gsvbb') : null;
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        global $data;
        $permOnMenu = 'Gsvbb';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]);
            return view('pages.gsvbb', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]); // Only grant Check
            return view('pages.gsvbb', $data);
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
                if (!$this->hasPermissionOnMenu('Gsvbb', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن مورد جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Gsvbb', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن مورد از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Gsvbb', $action)) {
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
        if($request->action == 'create_snsn'){

            $gsvbb_snsn = new \App\Gsvbb_snsn;
            $gsvbb_snsn->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $gsvbb_snsn->shk = $request->shk;
            $gsvbb_snsn->nkr = $request->nkr;
            $gsvbb_snsn->s = $request->s;
            $gsvbb_snsn->nq = $request->nq;
            $gsvbb_snsn->d1s = $request->d1s;
            $gsvbb_snsn->d1m = $request->d1m;
            $gsvbb_snsn->d1l = $request->d1l;
            $gsvbb_snsn->d2s = $request->d2s;
            $gsvbb_snsn->d2m = $request->d2m;
            $gsvbb_snsn->d2l = $request->d2l;
            $gsvbb_snsn->d3 = $request->d3;
            $gsvbb_snsn->d4 = $request->d4;
            $gsvbb_snsn->d5 = $request->d5;
            $gsvbb_snsn->mkt = $request->mkt;
            $gsvbb_snsn->z = $request->z;
            $gsvbb_snsn->aq = $request->aq;
            $gsvbb_snsn->aaa = $request->aaa;
            $gsvbb_snsn->aks = $request->aks;
            $gsvbb_snsn->aas = $request->aas;
            $gsvbb_snsn->description = $request->description;
            
            $result = $gsvbb_snsn->save();
            $gsvbb = $gsvbb_snsn;

            // SSKK MODEL
        } else if ($request->action == 'create_sat'){

            $gsvbb_sat = new \App\Gsvbb_sat;
            $gsvbb_sat->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $gsvbb_sat->shk = $request->shk;
            $gsvbb_sat->kt = $request->kt;
            $gsvbb_sat->khn = $request->khn;
            $gsvbb_sat->kgp = $request->kgp;
            $gsvbb_sat->krm = $request->krm;
            $gsvbb_sat->kp = $request->kp;
            $gsvbb_sat->ksh = $request->ksh;
            $gsvbb_sat->kcpk = $request->kcpk;
            $gsvbb_sat->ko = $request->ko;
            $gsvbb_sat->ktt = $request->ktt;
            $gsvbb_sat->qb = $request->qb;
            $gsvbb_sat->nk = $request->nk;
            $gsvbb_sat->tt = $request->tt;
            $gsvbb_sat->kv = $request->kv;
            $gsvbb_sat->kk = $request->kk;
            $gsvbb_sat->kg = $request->kg;
            $gsvbb_sat->ofb = $request->ofb;
            $gsvbb_sat->ts = $request->ts;
            $gsvbb_sat->description = $request->description;

            $result = $gsvbb_sat->save();
            $gsvbb = $gsvbb_sat;

            // SAAA MODEL
        } else if ($request->action == 'create_mmr'){

            $gsvbb_mmr = new \App\Gsvbb_mmr;
            $gsvbb_mmr->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
            $gsvbb_mmr->msh = $request->msh;
            $gsvbb_mmr->mt = $request->mt;
            $gsvbb_mmr->rl = $request->rl;
            $gsvbb_mmr->apm = $request->apm;
            $gsvbb_mmr->nh = $request->nh;
            $gsvbb_mmr->makd = $request->makd;
            $gsvbb_mmr->n = $request->n;
            $gsvbb_mmr->description = $request->description;

            $result = $gsvbb_mmr->save();
            $gsvbb = $gsvbb_mmr;

            // SMMS MODEL
        } 

        if ($result == 1) {
            $request->session()->flash('success', ["مورد $gsvbb->id با موفقیت به جمع مورد ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن مورد $gsvbb->id با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }
        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->userCan('Delete')) {
                echo 2;
            } else {
                if ($request->action == 'delete_snsn'){
                    echo \App\Gsvbb_snsn::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_sat'){
                    echo \App\Gsvbb_sat::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_mmr'){
                    echo \App\Gsvbb_mmr::where('id', $request->id)->delete();
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
        
        if ($request->action == 'update_snsn'){
            $result = \App\Gsvbb_snsn::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shk' => $request->shk,
                    'nkr' => $request->nkr,
                    's' => $request->s,
                    'nq' => $request->nq,
                    'd1s' => $request->d1s,
                    'd1m' => $request->d1m,
                    'd1l' => $request->d1l,
                    'd2s' => $request->d2s,
                    'd2m' => $request->d2m,
                    'd2l' => $request->d2l,
                    'd3' => $request->d3,
                    'd4' => $request->d4,
                    'd5' => $request->d5,
                    'mkt' => $request->mkt,
                    'z' => $request->z,
                    'aq' => $request->aq,
                    'aaa' => $request->aaa,
                    'aks' => $request->aks,
                    'aas' => $request->aas,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_sat'){
            $result = \App\Gsvbb_sat::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'shk' => $request->shk,
                    'kt' => $request->kt,
                    'khn' => $request->khn,
                    'kgp' => $request->kgp,
                    'krm' => $request->krm,
                    'kp' => $request->kp,
                    'ksh' => $request->ksh,
                    'kcpk' => $request->kcpk,
                    'ko' => $request->ko,
                    'ktt' => $request->ktt,
                    'qb' => $request->qb,
                    'nk' => $request->nk,
                    'tt' => $request->tt,
                    'kv' => $request->kv,
                    'kk' => $request->kk,
                    'kg' => $request->kg,
                    'ofb' => $request->ofb,
                    'ts' => $request->ts,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_mmr'){
            $result = \App\Gsvbb_mmr::where('id', $request->old_id)
                ->update([
                    'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                    'msh' => $request->msh,
                    'mt' => $request->mt,
                    'rl' => $request->rl,
                    'apm' => $request->apm,
                    'nh' => $request->nh,
                    'makd' => $request->makd,
                    'n' => $request->n,
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
