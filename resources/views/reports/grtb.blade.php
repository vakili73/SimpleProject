@extends('layouts.master')

@section('title', ' گزارش روزانه تهیه بدنه  | ')

@section('css')
    <link rel="stylesheet" href="{{ url('pwt.datepicker-0.4.5/dist/css/persian-datepicker-0.4.5.min.css') }}">
@endsection

@section('content')
    <!-- Default box -->
    <div class="box box-primary">
        <form action="{{ url('report/grtb') }}" method="post">
            {!! csrf_field() !!}
            <div class="box-header with-border">
                <h3 class="box-title">گزارش روزانه تهیه بدنه</h3>

                <div class="box-tools pull-left">
                    <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse"
                            data-toggle="tooltip"
                            title="">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="form-group has-feedback">
                            <label>تاریخ شروع</label>
                            <input id="startDatePicker" type="text" class="form-control" name="start_date"
                                   style="direction: ltr;" placeholder="Start Date">
                            <span class="fa fa-calendar form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="form-group has-feedback">
                            <label>تاریخ پایان</label>
                            <input id="endDatePicker" type="text" class="form-control" name="end_date"
                                   style="direction: ltr;" placeholder="End Date">
                            <span class="fa fa-calendar form-control-feedback"></span>
                        </div>
                    </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تاریخ</label>
                                <select name="datetype" class="form-control">
                                        <option value="دستی">دستی</option>
                                        <option value="ساخت">ساخت</option>
                                        <option value="بروز رسانی">بروز رسانی</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <img class="img-responsive img-rounded" src="{{ url('mine.jpg') }}"/>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button name="submit" value="xlsx" type="submit" class="btn btn-primary" style="margin-right: 5px;">
                    <i class="fa fa-download" style="margin-left: 5px;"></i>خروجی EXCEL
                </button>
            </div>
        </form>
    </div>

    {{--{!! '<div style="direction: ltr">' !!}--}}
    {{--{{ \Symfony\Component\VarDumper\VarDumper::dump(\Session::get('permissions')) }}--}}
    {{--{!! '</div>' !!}--}}
@endsection

@section('script')
    <script src="{{ url('pwt.datepicker-0.4.5/dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
    <script src="{{ url('pwt.datepicker-0.4.5/dist/lib/persian-date.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#startDatePicker").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#startDatePicker',
                altFormat: "YYYY-MM-DD HH:mm:ss",
            });

            $("#endDatePicker").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#endDatePicker',
                altFormat: "YYYY-MM-DD HH:mm:ss",
            });
        });
    </script>
@endsection