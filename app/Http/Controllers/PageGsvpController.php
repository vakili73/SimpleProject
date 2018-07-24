<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageGsvpController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'gsvp';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvp_sssn::class
            ],
            'shp' => [
                'alias' => 'شماره پرس',
                'class' => \App\Gsvp_sssn::class
            ],
            's' => [
                'alias' => 'سایز',
                'class' => \App\Gsvp_sssn::class
            ],
            'sp' => [
                'alias' => 'سیکل پرس',
                'class' => \App\Gsvp_sssn::class
            ],
            'np' => [
                'alias' => 'نوع پانچ',
                'class' => \App\Gsvp_sssn::class
            ],
            'tz' => [
                'alias' => 'تعداد ضربه',
                'class' => \App\Gsvp_sssn::class
            ],
            'rp' => [
                'alias' => 'راندمان پرس',
                'class' => \App\Gsvp_sssn::class
            ],
            'mt' => [
                'alias' => 'متراژ تولید',
                'class' => \App\Gsvp_sssn::class
            ],
            'mz' => [
                'alias' => 'مقدار ضایعات',
                'class' => \App\Gsvp_sssn::class
            ],
            'a' => [
                'alias' => 'علت',
                'class' => \App\Gsvp_sssn::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvp_sssn::class
            ],
        ];

        $data['params'] = '';
        if ($params['search'][0] == 'search'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data']['info'] = LibFilter::Rendering(\App\Gsvp_sssn::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search' ? $data['data']['info']->setPath('/gsvp') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvp_snft::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Gsvp_snft::class
            ],
            'np' => [
                'alias' => 'نظافت پانچ',
                'class' => \App\Gsvp_snft::class
            ],
            'fg' => [
                'alias' => 'فیلر گیری',
                'class' => \App\Gsvp_snft::class
            ],
            'td' => [
                'alias' => 'توقفات داخلی',
                'class' => \App\Gsvp_snft::class
            ],
            'ad' => [
                'alias' => 'اختلال درایر',
                'class' => \App\Gsvp_snft::class
            ],
            'ras' => [
                'alias' => 'رفع اختلاف سایز',
                'class' => \App\Gsvp_snft::class
            ],
            'ts' => [
                'alias' => 'تغییر سایز',
                'class' => \App\Gsvp_snft::class
            ],
            'tq' => [
                'alias' => 'تعویض قالب',
                'class' => \App\Gsvp_snft::class
            ],
            'tam' => [
                'alias' => 'تعویض آینه و مارک',
                'class' => \App\Gsvp_snft::class
            ],
            'kl' => [
                'alias' => 'خط لعاب',
                'class' => \App\Gsvp_snft::class
            ],
            'tk' => [
                'alias' => 'توقف خاک',
                'class' => \App\Gsvp_snft::class
            ],
            'kk' => [
                'alias' => 'کنترل کیفی',
                'class' => \App\Gsvp_snft::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvp_snft::class
            ],
        ];

        if ($params['search'][0] == 'search1'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data1']['info'] = LibFilter::Rendering(\App\Gsvp_snft::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search1' ? $data['data1']['info']->setPath('/gsvp') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvp_stt::class
            ],
            'shk' => [
                'alias' => 'شماره خط',
                'class' => \App\Gsvp_stt::class
            ],
            'b' => [
                'alias' => 'برق',
                'class' => \App\Gsvp_stt::class
            ],
            'a' => [
                'alias' => 'الکترونیک',
                'class' => \App\Gsvp_stt::class
            ],
            'm' => [
                'alias' => 'مکانیک',
                'class' => \App\Gsvp_stt::class
            ],
            'j' => [
                'alias' => 'جوشکاری',
                'class' => \App\Gsvp_stt::class
            ],
            's' => [
                'alias' => 'سرویس کاری',
                'class' => \App\Gsvp_stt::class
            ],
            'qb' => [
                'alias' => 'قطع برق',
                'class' => \App\Gsvp_stt::class
            ],
            'qg' => [
                'alias' => 'قطع گاز',
                'class' => \App\Gsvp_stt::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvp_stt::class
            ],
        ];

        if ($params['search'][0] == 'search2'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data2']['info'] = LibFilter::Rendering(\App\Gsvp_stt::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search2' ? $data['data2']['info']->setPath('/gsvp') : null;
        
        //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);

        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Gsvp_hma::class
            ],
            'h' => [
                'alias' => 'همکاران',
                'class' => \App\Gsvp_hma::class
            ],
            'aa' => [
                'alias' => 'اقدامات انجام شده',
                'class' => \App\Gsvp_hma::class
            ],
            'ts' => [
                'alias' => 'تعمیرات صورت گرفته',
                'class' => \App\Gsvp_hma::class
            ],
            'mn' => [
                'alias' => 'مناطق نظافت',
                'class' => \App\Gsvp_hma::class
            ],
            'mam' => [
                'alias' => 'میزان آب مخزن چیلر',
                'class' => \App\Gsvp_hma::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Gsvp_hma::class
            ],
        ];

        if ($params['search'][0] == 'search3'){
            $param = $params['search'][1];
            $data['params'] = $param;
        } else {
            $param = '';
        }
        $data['data3']['info'] = LibFilter::Rendering(\App\Gsvp_hma::class, $columnsInfo, $param, $params['perPage']);
        $params['search'][0] == 'search3' ? $data['data3']['info']->setPath('/gsvp') : null;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        global $data;
        $permOnMenu = 'Gsvp';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]);
            return view('pages.gsvp', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $this->load($data, ['perPage' => 5, 'search' => [$request->sv, $request->search]]); // Only grant Check
            return view('pages.gsvp', $data);
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
                if (!$this->hasPermissionOnMenu('Gsvp', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن مورد جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Gsvp', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن مورد از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Gsvp', $action)) {
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

            $gsvp_sssn = new \App\Gsvp_sssn;
            $gsvp_sssn->datetime = $request->datetime;
            $gsvp_sssn->shp = $request->shp;
            $gsvp_sssn->s = $request->s;
            $gsvp_sssn->sp = $request->sp;
            $gsvp_sssn->np = $request->np;
            $gsvp_sssn->tz = $request->tz;
            $gsvp_sssn->rp = $request->rp;
            $gsvp_sssn->mt = $request->mt;
            $gsvp_sssn->mz = $request->mz;
            $gsvp_sssn->a = $request->a;
            $gsvp_sssn->description = $request->description;
            
            $result = $gsvp_sssn->save();
            $gsvp = $gsvp_sssn;

            // SSKK MODEL
        } else if ($request->action == 'create_snft'){

            $gsvp_snft = new \App\Gsvp_snft;
            $gsvp_snft->datetime = $request->datetime;
            $gsvp_snft->shk = $request->shk;
            $gsvp_snft->np = $request->np;
            $gsvp_snft->fg = $request->fg;
            $gsvp_snft->td = $request->td;
            $gsvp_snft->ad = $request->ad;
            $gsvp_snft->ras = $request->ras;
            $gsvp_snft->ts = $request->ts;
            $gsvp_snft->tq = $request->tq;
            $gsvp_snft->tam = $request->tam;
            $gsvp_snft->kl = $request->kl;
            $gsvp_snft->tk = $request->tk;
            $gsvp_snft->kk = $request->kk;
            $gsvp_snft->description = $request->description;

            $result = $gsvp_snft->save();
            $gsvp = $gsvp_snft;

            // SAAA MODEL
        } else if ($request->action == 'create_stt'){

            $gsvp_stt = new \App\Gsvp_stt;
            $gsvp_stt->datetime = $request->datetime;
            $gsvp_stt->shk = $request->shk;
            $gsvp_stt->b = $request->b;
            $gsvp_stt->a = $request->a;
            $gsvp_stt->m = $request->m;
            $gsvp_stt->j = $request->j;
            $gsvp_stt->s = $request->s;
            $gsvp_stt->qb = $request->qb;
            $gsvp_stt->qg = $request->qg;
            $gsvp_stt->description = $request->description;

            $result = $gsvp_stt->save();
            $gsvp = $gsvp_stt;

            // SMMS MODEL
        } else if ($request->action == 'create_hma'){

        $gsvp_hma = new \App\Gsvp_hma;
        $gsvp_hma->datetime = $request->datetime;
        $gsvp_hma->h = $request->h;
        $gsvp_hma->aa = $request->aa;
        $gsvp_hma->ts = $request->ts;
        $gsvp_hma->mn = $request->mn;
        $gsvp_hma->mam = $request->mam;
        $gsvp_hma->description = $request->description;

        $result = $gsvp_hma->save();
        $gsvp = $gsvp_hma;

    }

        if ($result == 1) {
            $request->session()->flash('success', ["مورد $gsvp->id با موفقیت به جمع مورد ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن مورد $gsvp->id با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
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
                    echo \App\Gsvp_sssn::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_snft'){
                    echo \App\Gsvp_snft::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_stt'){
                    echo \App\Gsvp_stt::where('id', $request->id)->delete();
                } else if ($request->action == 'delete_hma'){
                    echo \App\Gsvp_hma::where('id', $request->id)->delete();
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
            
            $result = \App\Gsvp_sssn::where('id', $request->old_id)
                ->update([
                    'datetime' => $request->datetime,
                    'shp' => $request->shp,
                    's' => $request->s,
                    'sp' => $request->sp,
                    'np' => $request->np,
                    'tz' => $request->tz,
                    'rp' => $request->rp,
                    'mt' => $request->mt,
                    'mz' => $request->mz,
                    'a' => $request->a,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_snft'){
            $result = \App\Gsvp_snft::where('id', $request->old_id)
                ->update([
                    'datetime' => $request->datetime,
                    'shk' => $request->shk,
                    'np' => $request->np,
                    'fg' => $request->fg,
                    'td' => $request->td,
                    'ad' => $request->ad,
                    'ras' => $request->ras,
                    'ts' => $request->ts,
                    'tq' => $request->tq,
                    'tam' => $request->tam,
                    'kl' => $request->kl,
                    'tk' => $request->tk,
                    'kk' => $request->kk,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_stt'){
            $result = \App\Gsvp_stt::where('id', $request->old_id)
                ->update([
                    'datetime' => $request->datetime,
                    'shk' => $request->shk,
                    'b' => $request->b,
                    'a' => $request->a,
                    'm' => $request->m,
                    'j' => $request->j,
                    's' => $request->s,
                    'qb' => $request->qb,
                    'qg' => $request->qg,
                    'description' => $request->description,
                ]);
        } else if ($request->action == 'update_hma'){
            $result = \App\Gsvp_hma::where('id', $request->old_id)
                ->update([
                    'datetime' => $request->datetime,
                    'h' => $request->h,
                    'aa' => $request->aa,
                    'ts' => $request->ts,
                    'mn' => $request->mn,
                    'mam' => $request->mam,
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
