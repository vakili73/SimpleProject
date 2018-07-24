<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\jDateTime;

class ReportGrtbController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'report/grtb';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        global $data;
        return view('reports.grtb', $data);
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

        $query = \App\Grtb_stk::whereBetween($datetime, [$startDate, $endDate]);
        $query1 = \App\Grtb_ka::whereBetween($datetime, [$startDate, $endDate]);
        $query2 = \App\Grtb_mm::whereBetween($datetime, [$startDate, $endDate]);

        $load['data'] = $query->get();
        $load['data1'] = $query1->get();
        $load['data2'] = $query2->get();
        
        $load['description'] = 'GRTB'.' From ' . $jStartDate . ' to ' . $jEndDate;

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
                    'شماره بالمیل' => $item->shb,
                    'تعداد شارژ' => $item->tsh,
                    'کد فرمول' => $item->kf,
                    'زمان چرخش صبح' => $item->zchs,
                    'گلوله سرریز صبح' => $item->gss,
                    'روانساز صبح' => $item->rs,
                    'زمان چرخش عصر' => $item->zcha,
                    'گلوله سرریز عصر' => $item->gsa,
                    'روانساز عصر' => $item->ra,
                    'زمان چرخش شب' => $item->zchh,
                    'گلوله سرریز شب' => $item->gsh,
                    'روانساز شب' => $item->rh,
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
                    'کارکرد اسپری' => $item->ka,
                    'شیفت' => $item->shift,
                    'کدفرمول' => $item->kf,
                    'ساعت کارکرد' => $item->sk,
                    'تعداد لانس فعال' => $item->tlf,
                    'تعداد نازل' => $item->tn,
                    'فشار پمپ' => $item->fp,
                    'فشار ساکشن' => $item->fs,
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
                    'عنوان' => $item->t,
                    'ستون' => $item->c,
                    'مقدار' => $item->v,
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