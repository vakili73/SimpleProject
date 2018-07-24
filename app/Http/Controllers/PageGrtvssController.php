<?php

namespace App\Http\Controllers;

use App\Http\Libraries\LibFilter;
use App\Http\Libraries\GregorianDateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\VarDumper;

class PageGrtvssController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'grtvss';
    }

    private function load(& $data, $params)
    {
        $columnsInfo = [
            'datetime' => [
                'alias' => 'تاریخ',
                'class' => \App\Grtvss_sktn::class
            ],
            'shift' => [
                'alias' => 'شیفت',
                'class' => \App\Grtvss_sktn::class
            ],
            'khbnvn' => [
                'alias' => 'خ نوار نقاله',
                'class' => \App\Grtvss_sktn::class
            ],
            'khbsngsf' => [
                'alias' => 'خ س.ش فکی',
                'class' => \App\Grtvss_sktn::class
            ],
            'khbsngsch' => [
                'alias' => 'خ س.ش چکشی',
                'class' => \App\Grtvss_sktn::class
            ],
            'tts' => [
                'alias' => 'ت توری و سرند',
                'class' => \App\Grtvss_sktn::class
            ],
            'km' => [
                'alias' => 'خ موتور',
                'class' => \App\Grtvss_sktn::class
            ],
            'kr' => [
                'alias' => 'خ رولیک',
                'class' => \App\Grtvss_sktn::class
            ],
            'kl' => [
                'alias' => 'خ لودر',
                'class' => \App\Grtvss_sktn::class
            ],
            'n' => [
                'alias' => 'نظافت',
                'class' => \App\Grtvss_sktn::class
            ],
            's' => [
                'alias' => 'سایر',
                'class' => \App\Grtvss_sktn::class
            ],
            'description' => [
                'alias' => 'توضیحات',
                'class' => \App\Grtvss_sktn::class
            ],
        ];

        $data['data']['info'] = LibFilter::Rendering(\App\Grtvss_sktn::class, $columnsInfo, $params['search'], $params['perPage']);
        $data['data']['info']->setPath('/grtvss');
    //    \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
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
        $permOnMenu = 'Grtvss';
        $canCreate = $this->hasPermissionOnMenu($permOnMenu, 'C');
        $canRead = $this->hasPermissionOnMenu($permOnMenu, 'R');
        $canDelete = $this->hasPermissionOnMenu($permOnMenu, 'D');
        $canUpdate = $this->hasPermissionOnMenu($permOnMenu, 'U');

        $onlyBoxInfo = $canRead && !$canCreate && !$canDelete && !$canUpdate;
        $data['onlyBoxInfo'] = !$onlyBoxInfo;

        if ($this->isSuperAdmin) {
            $this->load($data, ['perPage' => 5, 'search' => $request->search]);
            return view('pages.grtvss', $data);
        } elseif ($canCreate || $canRead || $canDelete || $canUpdate) {
            $this->load($data, ['perPage' => 5, 'search' => $request->search]); // Only grant Check
            return view('pages.grtvss', $data);
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
                if (!$this->hasPermissionOnMenu('Grtvss', $action)) {
                    \Session::flash('warning', ['شما دسترسی افزودن مورد جدید را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'delete') || ($action == 'd')) {
                if (!$this->hasPermissionOnMenu('Grtvss', $action)) {
                    \Session::flash('warning', ['شما اجازه پاک کردن مورد از سیستم را ندارید.']);
                    $result = false;
                }
            } elseif (($action == 'update') || ($action == 'u')) {
                if (!$this->hasPermissionOnMenu('Grtvss', $action)) {
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

        $this->validate($request, [
            'shift' => 'required',
        ]);

        $grtvss = new \App\Grtvss_sktn;
        $grtvss->datetime = GregorianDateTime::toGregorianDateTime($request->datetime);
        $grtvss->shift = $request->shift;
        $grtvss->khbnvn = $request->khbnvn;
        $grtvss->khbsngsf = $request->khbsngsf;
        $grtvss->khbsngsch = $request->khbsngsch;
        $grtvss->tts = $request->tts;
        $grtvss->km = $request->km;
        $grtvss->kr = $request->kr;
        $grtvss->kl = $request->kl;
        $grtvss->n = $request->n;
        $grtvss->s = $request->s;
        $grtvss->description = $request->description;

        $result = $grtvss->save();

        if ($result == 1) {
            $request->session()->flash('success', ["مورد $grtvss->id با موفقیت به جمع مورد ها پیوست."]);
        } else {
            $request->session()->flash('warning', ["افزودن مورد $grtvss->id با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
        }
        return $this->getIndex($request);
    }

    public function postDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!$this->userCan('Delete')) {
                echo 2;
            } else {
                echo \App\Grtvss_sktn::where('id', $request->id)->delete();
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
        
        $this->validate($request, [
            'shift' => 'required',
        ]);

        $result = \App\Grtvss_sktn::where('id', $request->old_id)
            ->update([
                'datetime' => GregorianDateTime::toGregorianDateTime($request->datetime),
                'shift' => $request->shift,
                'khbnvn' => $request->khbnvn,
                'khbsngsf' => $request->khbsngsf,
                'khbsngsch' => $request->khbsngsch,
                'tts' => $request->tts,
                'km' => $request->km,
                'kr' => $request->kr,
                'kl' => $request->kl,
                'n' => $request->n,
                's' => $request->s,
                'description' => $request->description,
            ]);

        if ($result == 1) {
            $request->session()->flash('information', ["بروز رسانی با موفقیت انجام شد."]);
        } else {
            $request->session()->flash('warning', ["بروز رسانی با شکست رو به رو شد."]);
        }

        return $this->getIndex($request);
    }
}
