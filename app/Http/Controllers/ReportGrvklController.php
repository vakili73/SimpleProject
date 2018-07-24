<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\jDateTime;

class ReportGrvklController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'report/grvkl';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        global $data;
        return view('reports.grvkl', $data);
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

        $query = \App\Grvkl_sssn::whereBetween($datetime, [$startDate, $endDate]);
        $query1 = \App\Grvkl_sskk::whereBetween($datetime, [$startDate, $endDate]);
        $query2 = \App\Grvkl_saaa::whereBetween($datetime, [$startDate, $endDate]);
        $query3 = \App\Grvkl_smms::whereBetween($datetime, [$startDate, $endDate]);

        $load['data'] = $query->get();
        $load['data1'] = $query1->get();
        $load['data2'] = $query2->get();
        $load['data3'] = $query3->get();
        
        $load['description'] = 'GRVKL'.' From ' . $jStartDate . ' to ' . $jEndDate;

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
                    'شیفت' => $item->shift,
                    'شماره خط' => $item->shk,
                    'سایز' => $item->s,
                    'نام طرح' => $item->nt,
                    'متراژ تولید' => $item->mt,
                    'کد انگوب' => $item->ka,
                    'کد لعال' => $item->kl,
                    'تعداد واگن' => $item->tv,
                    'مقدار ضایعات' => $item->mz,
                    'علت و محل' => $item->avm,
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
                    'شیفت' => $item->shift,
                    'شماره خط' => $item->shk,
                    'کمبود واگن خام' => $item->kvk,
                    'کاشی چرخان' => $item->kch,
                    'کابین آب' => $item->ka,
                    'رولرماتیک' => $item->rm,
                    'خرابی روتو' => $item->kr,
                    'خ.د تعمیرات' => $item->t,
                    'خ.د نظافت خودکار' => $item->nk,
                    'کنترل کیفی' => $item->kk,
                    'قطع برق' => $item->qb,
                    'نظافت و شست و شو' => $item->nsh,
                    'تعمیرات برق' => $item->b,
                    'تعمیرات مکانیک' => $item->m,
                    'تعمیرات الکترونیک' => $item->a,
                    'مشکل لعاب و انگوب' => $item->mla,
                    'قوس و لامینه' => $item->ql,
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
                    'شیفت' => $item->shift,
                    'شماره خط' => $item->shk,
                    'اپراتور کابین' => $item->apk,
                    'اپراتور چاپ' => $item->apc,
                    'اپراتور رولرماتیک' => $item->apr,
                    'توضیحات' => $item->description,
                    'تاریخ ساخت' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->created_at)),
                    'تاریخ بروز رسانی' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->updated_at)),
                ]);
            }
            $sheet->setRightToLeft(true);
            $sheet->fromArray($report);
        });

        $data = $load['data3'];
        $excel->sheet('sheet 3', function ($sheet) use ($data) {
            $report = [];
            foreach ($data as $item) {
                array_push($report, [
                    'id' => $item->id,
                    'تاریخ' => jDateTime::strftime('Y-m-d H:i:s', strtotime($item->datetime)),
                    'شیفت' => $item->shift,
                    'م نمونه گیری' => $item->mng,
                    'م ترانسفر' => $item->mt,
                    'سر شیفت' => $item->ssh,
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