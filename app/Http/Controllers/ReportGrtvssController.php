<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\jDateTime;

class ReportGrtvssController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        global $data;
        $data['route'] = 'report/grtvss';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        global $data;
        return view('reports.grtvss', $data);
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

        $query = \App\Grtvss_sktn::whereBetween($datetime, [$startDate, $endDate]);

        $load['data'] = $query->get();
        
        $load['description'] = 'GRTVSS'.' From ' . $jStartDate . ' to ' . $jEndDate;

        switch ($request->submit) {
            case 'xlsx':
                if (!$load['data']->isEmpty())
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
                    'خ نوار نقاله' => $item->khbnvn,
                    'خ س.ش فکی' => $item->khbsngsf,
                    'خ س.ش چکشی' => $item->khbsngsch,
                    'ت توری و سرند' => $item->tts,
                    'خ موتور' => $item->km,
                    'خ رولیک' => $item->kr,
                    'خ لودر' => $item->kl,
                    'نظافت' => $item->n,
                    'سایر' => $item->s,
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