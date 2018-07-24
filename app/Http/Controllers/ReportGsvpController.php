<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\jDateTime;

class ReportGsvpController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'report/gsvp';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        global $data;
        return view('reports.gsvp', $data);
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

        $query = \App\Gsvp_sssn::whereBetween($datetime, [$startDate, $endDate]);
        $query1 = \App\Gsvp_snft::whereBetween($datetime, [$startDate, $endDate]);
        $query2 = \App\Gsvp_stt::whereBetween($datetime, [$startDate, $endDate]);
        $query3 = \App\Gsvp_hma::whereBetween($datetime, [$startDate, $endDate]);

        $load['data'] = $query->get();
        $load['data1'] = $query1->get();
        $load['data2'] = $query2->get();
        $load['data3'] = $query3->get();
        
        $load['description'] = 'GSVP'.' From ' . $jStartDate . ' to ' . $jEndDate;

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
                    'شماره پرس' => $item->shp,
                    'سایز' => $item->s,
                    'سیکل پرس' => $item->sp,
                    'نوع پانچ' => $item->np,
                    'تعداد ضربه' => $item->tz,
                    'راندمان پرس' => $item->rp,
                    'متراژ تولید' => $item->mt,
                    'مقدار ضایعات' => $item->mz,
                    'علت' => $item->a,
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
                    'نظافت پانچ' => $item->np,
                    'فیلر گیری' => $item->fg,
                    'توقفات داخلی' => $item->td,
                    'اختلال درایر' => $item->ad,
                    'رفع اختلاف سایز' => $item->ras,
                    'تغییر سایز' => $item->ts,
                    'تعویض قالب' => $item->tq,
                    'تعویض آینه و مارک' => $item->tam,
                    'خط لعاب' => $item->kl,
                    'توقف خاک' => $item->tk,
                    'کنترل کیفی' => $item->kk,
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
                    'شماره خط' => $item->shk,
                    'برق' => $item->b,
                    'الکترونیک' => $item->a,
                    'مکانیک' => $item->m,
                    'جوشکاری' => $item->j,
                    'سرویس کاری' => $item->s,
                    'قطع برق' => $item->qb,
                    'قطع گاز' => $item->qg,
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
                    'همکاران' => $item->h,
                    'اقدامات انجام شده' => $item->aa,
                    'تعمیرات صورت گرفته' => $item->ts,
                    'مناطق نظافت' => $item->mn,
                    'میزان آب مخزن چیلر' => $item->mam,
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