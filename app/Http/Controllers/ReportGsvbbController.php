<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\jDateTime;

class ReportGsvbbController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'report/gsvbb';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        global $data;
        return view('reports.gsvbb', $data);
    }

    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);

        function toGregorianDateTime($dateTimePickerFormatString)
        {
            $split = explode(' ', $dateTimePickerFormatString);
            $date = explode('-', $split[0]);
            $time = explode(':', $split[1]);
            $date = jDateTime::toGregorian((int)$date[0], (int)$date[1], (int)$date[2]);
            $result = date('Y-m-d H:i:s', mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]));
            return $result;
        }

        $jStartDate = $request->start_date;
        $jEndDate = $request->end_date;
        $startDate = toGregorianDateTime($jStartDate);
        $endDate = toGregorianDateTime($jEndDate);

        if ($request->datetype == 'دستی'){
            $datetime = 'datetime';
        } else if($request->datetype == 'ساخت'){
            $datetime = 'created_at';
        } else if($request->datetype == 'بروز رسانی') {
            $datetime = 'updated_at';
        }

        $query = \App\Gsvbb_snsn::whereBetween($datetime, [$startDate, $endDate]);
        $query1 = \App\Gsvbb_sat::whereBetween($datetime, [$startDate, $endDate]);
        $query2 = \App\Gsvbb_mmr::whereBetween($datetime, [$startDate, $endDate]);

        $load['data'] = $query->get();
        $load['data1'] = $query1->get();
        $load['data2'] = $query2->get();
        
        $load['description'] = 'GSVBB'.' From ' . $jStartDate . ' to ' . $jEndDate;

        switch ($request->submit) {
            case 'xlsx':
                if (!$load['data']->isEmpty() || !$load['data1']->isEmpty() || !$load['data2']->isEmpty())
                    $this->xlsxExporter($load, $request);
                else
                    $request->session()->flash('information', ["گزارش خالی است! فیلد تاریخ را تنظیم کنید!"]);
                break;
        }

        return $this->getIndex();
    }

    private function xlsxExporter($load, $request)
    {
        $excel = Excel::create($load['description']);
        // Set the title
        $excel->setTitle('گزارش کامل');

        $data = $load['data'];
        $excel->sheet('sheet 0', function ($sheet) use ($data) {
            $report = [];
            foreach ($data as $item) {
                array_push($report, [
                    'id' => $item->id,
                    'تاریخ' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->datetime)),
                    'شماره خط' => $item->shk,
                    'نام و کد رنگ' => $item->nkr,
                    'سایز' => $item->s,
                    'نوع قالب' => $item->nq,
                    'درجه ۱ س' => $item->d1s,
                    'درجه ۱ م' => $item->d1m,
                    'درجه ۱ ل' => $item->d1l,
                    'درجه ۲ س' => $item->d2s,
                    'درجه ۲ م' => $item->d2m,
                    'درجه ۲ ل' => $item->d2l,
                    'درجه ۳' => $item->d3,
                    'درجه ۴' => $item->d4,
                    'درجه ۵' => $item->d5,
                    'متراژ کلی تولید' => $item->mkt,
                    'ضایعات' => $item->z,
                    'عیوب قوس' => $item->aq,
                    'عیوب اختلاف ابعاد' => $item->aaa,
                    'عیوب کاهش سایز' => $item->aks,
                    'عیوب افزایش سایز' => $item->aas,
                    'توضیحات' => $item->description,
                    'تاریخ ساخت' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->created_at)),
                    'تاریخ بروز رسانی' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->updated_at)),
                ]);
            }
            $sheet->setRightToLeft(true);
            $sheet->fromArray($report);
        });

        $data = $load['data1'];
        $excel->sheet('sheet 1', function ($sheet) use ($data) {
            $report = [];
            foreach ($data as $item) {
                array_push($report, [
                    'id' => $item->id,
                    'تاریخ' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->datetime)),
                    'شماره خط' => $item->shk,
                    'خرابی ترانسفر' => $item->kt,
                    'خرابی خط هوایی نوار نقاله' => $item->khn,
                    'خرابی G/P' => $item->kgp,
                    'خرابی رولرماتیک' => $item->krm,
                    'خرابی پرینتر' => $item->kp,
                    'خرابی شیرینگ' => $item->ksh,
                    'خرابی CPK' => $item->kcpk,
                    'خرابی استاکر' => $item->ko,
                    'خرابی و تعویض تسمه' => $item->ktt,
                    'قطع برق' => $item->qb,
                    'نداشتن کارتن' => $item->nk,
                    'تعویض طرح' => $item->tt,
                    'کمبود واگن' => $item->kv,
                    'کنترل کیفی' => $item->kk,
                    'خرابی گاید' => $item->kg,
                    'افت فشار باد' => $item->ofb,
                    'تغییر سایز' => $item->ts,
                    'توضیحات' => $item->description,
                    'تاریخ ساخت' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->created_at)),
                    'تاریخ بروز رسانی' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->updated_at)),
                ]);
            }
            $sheet->setRightToLeft(true);
            $sheet->fromArray($report);
        });

        $data = $load['data2'];
        $excel->sheet('sheet 2', function ($sheet) use ($data) {
            $report = [];
            foreach ($data as $item) {
                array_push($report, [
                    'id' => $item->id,
                    'تاریخ' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->datetime)),
                    'مسیول شیفت' => $item->msh,
                    'مسیول ترانسفر' => $item->mt,
                    'راننده لیفتراک' => $item->rl,
                    'اسامی پرسنل مرخصی' => $item->apm,
                    'نام همکاران' => $item->nh,
                    'معایب اثر گذار در کاهش درجه' => $item->makd,
                    'نواقص' => $item->n,
                    'توضیحات' => $item->description,
                    'تاریخ ساخت' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->created_at)),
                    'تاریخ بروز رسانی' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->updated_at)),
                ]);
            }
            $sheet->setRightToLeft(true);
            $sheet->fromArray($report);
        });

        $excel->export('xlsx');
    }
}