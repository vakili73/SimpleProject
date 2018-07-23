@extends('layouts.master')

@section('title', 'گزارش شیفت واحد بسته بندی | ')

@section('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ url('pwt.datepicker-0.4.5/dist/css/persian-datepicker-0.4.5.min.css') }}">
@endsection

@section('content')
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form id="form" action="{{ url('gsvbb/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش شیفت واحد بسته بندی</h3>

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
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تاریخ</label>
                                <input id="DatePicker" type="text" class="form-control" name="datetime"
                                    style="direction: ltr;" placeholder="Date">
                                <span class="fa fa-calendar form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>شماره خط</label>
                                <select id="shk" name="shk" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نام و کد رنگ</label>
                                <input id="nkr" type="text" class="form-control" name="nkr" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>سایز</label>
                                <input id="s" type="text" class="form-control" name="s" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نوع قالب</label>
                                <input id="nq" type="text" class="form-control" name="nq" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۱ س</label>
                                <input id="d1s" type="text" class="form-control" name="d1s" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۱ م</label>
                                <input id="d1m" type="text" class="form-control" name="d1m" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۱ ل</label>
                                <input id="d1l" type="text" class="form-control" name="d1l" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۲ س</label>
                                <input id="d2s" type="text" class="form-control" name="d2s" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۲ م</label>
                                <input id="d2m" type="text" class="form-control" name="d2m" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۲ ل</label>
                                <input id="d2l" type="text" class="form-control" name="d2l" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۳</label>
                                <input id="d3" type="text" class="form-control" name="d3" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۴</label>
                                <input id="d4" type="text" class="form-control" name="d4" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>درجه ۵</label>
                                <input id="d5" type="text" class="form-control" name="d5" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>متراژ کلی تولید</label>
                                <input id="mkt" type="text" class="form-control" name="mkt" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>ضایعات</label>
                                <input id="z" type="text" class="form-control" name="z" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>عیوب قوس</label>
                                <input id="aq" type="text" class="form-control" name="aq" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>عیوب اختلاف ابعاد</label>
                                <input id="aaa" type="text" class="form-control" name="aaa" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>عیوب کاهش سایز</label>
                                <input id="aks" type="text" class="form-control" name="aks" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>عیوب افزایش سایز</label>
                                <input id="aas" type="text" class="form-control" name="aas" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توضیحات</label>
                                <input id="description" type="text" class="form-control" name="description" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div id="box-footer" class="box-footer">
                    <button name="action" type="submit" value="create_snsn" class="btn btn-primary">افزودن</button>
                </div>
            </form>
        </div>

    @endif

    {{--{!! '<div style="direction: ltr">' !!}--}}
    {{--{{ \Symfony\Component\VarDumper\VarDumper::dump($data['info']) }}--}}
    {{--{!! '</div>' !!}--}}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">
                اطلاعات ثبت شده
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools" style="left: 165px;">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Help">
                    <i class="fa fa-question"></i></button>
            </div>
            <!-- /. tools -->
            <div class="box-tools">
                <form action="{{ url('gsvbb') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input name="search" class="form-control pull-right" placeholder="Search" type="text">
                        <input name="sv" value="search" type="hidden">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>تاریخ</th>
                    <th>شماره خط</th>
                    <th>نام و کد رنگ</th>
                    <th>سایز</th>
                    <th>نوع قالب</th>
                    <th>درجه ۱ س</th>
                    <th>درجه ۱ م</th>
                    <th>درجه ۱ ل</th>
                    <th>درجه ۲ س</th>
                    <th>درجه ۲ م</th>
                    <th>درجه ۲ ل</th>
                    <th>درجه ۳</th>
                    <th>درجه ۴</th>
                    <th>درجه ۵</th>
                    <th>متراژ کلی تولید</th>
                    <th>ضایعات</th>
                    <th>عیوب قوس</th>
                    <th>عیوب اختلاف ابعاد</th>
                    <th>عیوب کاهش سایز</th>
                    <th>عیوب افزایش سایز</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shk }}</td>
                        <td>{{ $item->nkr }}</td>
                        <td>{{ $item->s }}</td>
                        <td>{{ $item->nq }}</td>
                        <td>{{ $item->d1s }}</td>
                        <td>{{ $item->d1m }}</td>
                        <td>{{ $item->d1l }}</td>
                        <td>{{ $item->d2s }}</td>
                        <td>{{ $item->d2m }}</td>
                        <td>{{ $item->d2l }}</td>
                        <td>{{ $item->d3 }}</td>
                        <td>{{ $item->d4 }}</td>
                        <td>{{ $item->d5 }}</td>
                        <td>{{ $item->mkt }}</td>
                        <td>{{ $item->z }}</td>
                        <td>{{ $item->aq }}</td>
                        <td>{{ $item->aaa }}</td>
                        <td>{{ $item->aks }}</td>
                        <td>{{ $item->aas }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="btn-group">
                                <button name="trash" type="button" class="btn btn-warning btn-xs"><i
                                            class="fa fa-trash"></i>
                                </button>
                                <button name="edit" type="button" class="btn btn-info btn-xs"><i
                                            class="fa fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if ($data['info']->render() != '')
            <div class="box-footer clearfix">
                {!! $data['info']->appends(['search' => $params['search']])->links() !!}
            </div>
        @endif

    </div>
    <!-- /.box -->
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form id="form1" action="{{ url('gsvbb/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش شیفت واحد بسته بندی</h3>

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
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تاریخ</label>
                                <input id="DatePicker1" type="text" class="form-control" name="datetime"
                                    style="direction: ltr;" placeholder="Date">
                                <span class="fa fa-calendar form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>شماره خط</label>
                                <select id="shk1" name="shk" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی ترانسفر</label>
                                <input id="kt1" type="text" class="form-control" name="kt" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی خط هوایی نوار نقاله</label>
                                <input id="khn1" type="text" class="form-control" name="khn" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی G/P</label>
                                <input id="kgp1" type="text" class="form-control" name="kgp" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی رولرماتیک</label>
                                <input id="krm1" type="text" class="form-control" name="krm" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی پرینتر</label>
                                <input id="kp1" type="text" class="form-control" name="kp" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی شیرینگ</label>
                                <input id="ksh1" type="text" class="form-control" name="ksh" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی CPK</label>
                                <input id="kcpk1" type="text" class="form-control" name="kcpk" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی استاکر</label>
                                <input id="ko1" type="text" class="form-control" name="ko" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی و تعویض تسمه</label>
                                <input id="ktt1" type="text" class="form-control" name="ktt" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>قطع برق</label>
                                <input id="qb1" type="text" class="form-control" name="qb" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نداشتن کارتن</label>
                                <input id="nk1" type="text" class="form-control" name="nk" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تعویض طرح</label>
                                <input id="tt1" type="text" class="form-control" name="tt" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>کمبود واگن</label>
                                <input id="kv1" type="text" class="form-control" name="kv" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>کنترل کیفی</label>
                                <input id="kk1" type="text" class="form-control" name="kk" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی گاید</label>
                                <input id="kg1" type="text" class="form-control" name="kg" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>افت فشار باد</label>
                                <input id="ofb1" type="text" class="form-control" name="ofb" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تغییر سایز</label>
                                <input id="ts1" type="text" class="form-control" name="ts" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توضیحات</label>
                                <input id="description1" type="text" class="form-control" name="description" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div id="box-footer1" class="box-footer">
                    <button name="action" type="submit" value="create_sat" class="btn btn-primary">افزودن</button>
                </div>
            </form>
        </div>

    @endif

    {{--{!! '<div style="direction: ltr">' !!}--}}
    {{--{{ \Symfony\Component\VarDumper\VarDumper::dump($data['info']) }}--}}
    {{--{!! '</div>' !!}--}}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">
                اطلاعات ثبت شده
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools" style="left: 165px;">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Help">
                    <i class="fa fa-question"></i></button>
            </div>
            <!-- /. tools -->
            <div class="box-tools">
                <form action="{{ url('gsvbb') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input name="search" class="form-control pull-right" placeholder="Search" type="text">
                        <input name="sv" value="search1" type="hidden">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>تاریخ</th>
                    <th>شماره خط</th>
                    <th>خرابی ترانسفر</th>
                    <th>خرابی خط هوایی نوار نقاله</th>
                    <th>خرابی G/P</th>
                    <th>خرابی رولرماتیک</th>
                    <th>خرابی پرینتر</th>
                    <th>خرابی شیرینگ</th>
                    <th>خرابی CPK</th>
                    <th>خرابی استاکر</th>
                    <th>خرابی و تعویض تسمه</th>
                    <th>قطع برق</th>
                    <th>نداشتن کارتن</th>
                    <th>تعویض طرح</th>
                    <th>کمبود واگن</th>
                    <th>کنترل کیفی</th>
                    <th>خرابی گاید</th>
                    <th>افت فشار باد</th>
                    <th>تغییر سایز</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data1['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shk }}</td>
                        <td>{{ $item->kt }}</td>
                        <td>{{ $item->khn }}</td>
                        <td>{{ $item->kgp }}</td>
                        <td>{{ $item->krm }}</td>
                        <td>{{ $item->kp }}</td>
                        <td>{{ $item->ksh }}</td>
                        <td>{{ $item->kcpk }}</td>
                        <td>{{ $item->ko }}</td>
                        <td>{{ $item->ktt }}</td>
                        <td>{{ $item->qb }}</td>
                        <td>{{ $item->nk }}</td>
                        <td>{{ $item->tt }}</td>
                        <td>{{ $item->kv }}</td>
                        <td>{{ $item->kk }}</td>
                        <td>{{ $item->kg }}</td>
                        <td>{{ $item->ofb }}</td>
                        <td>{{ $item->ts }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="btn-group">
                                <button name="trash1" type="button" class="btn btn-warning btn-xs"><i
                                            class="fa fa-trash"></i>
                                </button>
                                <button name="edit1" type="button" class="btn btn-info btn-xs"><i
                                            class="fa fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if ($data1['info']->render() != '')
            <div class="box-footer clearfix">
                {!! $data1['info']->appends(['search' => $params['search']])->links() !!}
            </div>
        @endif

    </div>
    <!-- /.box -->
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form id="form2" action="{{ url('gsvbb/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش روزانه واحد بسته بندی</h3>

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
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تاریخ</label>
                                <input id="DatePicker2" type="text" class="form-control" name="datetime"
                                    style="direction: ltr;" placeholder="Date">
                                <span class="fa fa-calendar form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>مسیول شیفت</label>
                                <input id="msh2" type="text" class="form-control" name="msh" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>مسیول ترانسفر</label>
                                <input id="mt2" type="text" class="form-control" name="mt" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>راننده لیفتراک</label>
                                <input id="rl2" type="text" class="form-control" name="rl" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>معایب اثر گذار در کاهش درجه</label>
                                <input id="makd2" type="text" class="form-control" name="makd" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نواقص</label>
                                <input id="n2" type="text" class="form-control" name="n" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نام همکاران</label>
                                <input id="nh2" type="text" class="form-control" name="nh" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>اسامی پرسنل مرخصی روزانه و غیبت</label>
                                <input id="apm2" type="text" class="form-control" name="apm" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توضیحات</label>
                                <input id="description2" type="text" class="form-control" name="description" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div id="box-footer2" class="box-footer">
                    <button name="action" type="submit" value="create_mmr" class="btn btn-primary">افزودن</button>
                </div>
            </form>
        </div>

    @endif

    {{--{!! '<div style="direction: ltr">' !!}--}}
    {{--{{ \Symfony\Component\VarDumper\VarDumper::dump($data['info']) }}--}}
    {{--{!! '</div>' !!}--}}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">
                اطلاعات ثبت شده
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools" style="left: 165px;">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Help">
                    <i class="fa fa-question"></i></button>
            </div>
            <!-- /. tools -->
            <div class="box-tools">
                <form action="{{ url('gsvbb') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input name="search" class="form-control pull-right" placeholder="Search" type="text">
                        <input name="sv" value="search2" type="hidden">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>تاریخ</th>
                    <th>مسیول شیفت</th>
                    <th>مسیول ترانسفر</th>
                    <th>راننده لیفتراک</th>
                    <th>اسامی پرسنل مرخصی</th>
                    <th>نام همکاران</th>
                    <th>معایب اثر گذار در کاهش درجه</th>
                    <th>نواقص</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data2['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->msh }}</td>
                        <td>{{ $item->mt }}</td>
                        <td>{{ $item->rl }}</td>
                        <td>{{ $item->apm }}</td>
                        <td>{{ $item->nh }}</td>
                        <td>{{ $item->makd }}</td>
                        <td>{{ $item->n }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="btn-group">
                                <button name="trash2" type="button" class="btn btn-warning btn-xs"><i
                                            class="fa fa-trash"></i>
                                </button>
                                <button name="edit2" type="button" class="btn btn-info btn-xs"><i
                                            class="fa fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if ($data2['info']->render() != '')
            <div class="box-footer clearfix">
                {!! $data2['info']->appends(['search' => $params['search']])->links() !!}
            </div>
        @endif

    </div>
    <!-- /.box -->
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function () {
            // help button listener
            $('button[title="Help"]').click(function () {
                Pace.restart();

                BootstrapDialog.show({
                    title: 'راهنمای استفاده از جستجوی هوشمند !',
                    draggable: true, // <-- Default value is false
                    message: $('<div></div>').load('/smart_search.html')
                });
            });
            @if($onlyBoxInfo)
            // PNotify Configuration
            PNotify.prototype.options.styling = "bootstrap3";
            function newPNotify(type, title, text) {
                var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                var opts = {
                    title: title,
                    text: text,
                    nonblock: {
                        nonblock: true,
                        nonblock_opacity: .2
                    },
                    delay: 3000,
                    addclass: "stack-topleft",
                    stack: stack_topleft
                };
                switch (type) {
                    case 'error':
                        opts.type = "error";
                        break;
                    case 'info':
                        opts.type = "info";
                        break;
                    case 'success':
                        opts.type = "success";
                        break;
                    case 'notice':
                        opts.type = "notice";
                        break;
                }
                new PNotify(opts);
            }

            // delete handler function
            $('table tbody .btn-group [name="trash"]').click(function () {
                item = $(this).parent().parent().parent();
                element = $(this).parent().parent().siblings();
                BootstrapDialog.confirm({
                    title: 'اخطار !',
                    message: 'آیا مطمئن هستید که میخواهید مورد ' + element.eq(0).text() + ' را از سیستم حذف کنید!',
                    type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                    closable: true, // <-- Default value is false
                    draggable: true, // <-- Default value is false
                    btnCancelLabel: 'خیر', // <-- Default value is 'Cancel',
                    btnCancelClass: 'btn-success pull-left', // <-- If you didn't specify it, dialog type will be used,
                    btnOKLabel: 'بلی', // <-- Default value is 'OK',
                    btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
                    btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
                    callback: function (result) {
                        // result will be true if button was click, while it will be false if users close the dialog directly.
                        if (result) {
                            $.ajax({
                                method: 'POST',
                                url: '{{ url("gsvbb/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_snsn', id: element.eq(0).text()},
                                success: function (result) {
                                    if (result === '0') {
                                        newPNotify('info', 'اطلاعات!', "حذف مورد " + element.eq(0).text() + " با مشکل رو به رو شده.");
                                    }
                                    else if (result === '1') {
                                        newPNotify('success', 'کامیابی!', "مورد " + element.eq(0).text() + " با موفقیت از سیستم حذف شد.");
                                        item.remove();
                                    } else if (result === '2') {
                                        newPNotify('error', 'خطا!', 'اجازه حذف مورد را ندارید.');
                                    }
                                },
                                error: function () {
                                    newPNotify('notice', 'هشدار!', "ارتباط شما با سیستم قطع شده لطفا دوباره وارد شوید.");
                                }
                            });
                            Pace.restart();
                        }
                    }
                });
            });
            // delete1 handler function
            $('table tbody .btn-group [name="trash1"]').click(function () {
                item = $(this).parent().parent().parent();
                element = $(this).parent().parent().siblings();
                BootstrapDialog.confirm({
                    title: 'اخطار !',
                    message: 'آیا مطمئن هستید که میخواهید مورد ' + element.eq(0).text() + ' را از سیستم حذف کنید!',
                    type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                    closable: true, // <-- Default value is false
                    draggable: true, // <-- Default value is false
                    btnCancelLabel: 'خیر', // <-- Default value is 'Cancel',
                    btnCancelClass: 'btn-success pull-left', // <-- If you didn't specify it, dialog type will be used,
                    btnOKLabel: 'بلی', // <-- Default value is 'OK',
                    btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
                    btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
                    callback: function (result) {
                        // result will be true if button was click, while it will be false if users close the dialog directly.
                        if (result) {
                            $.ajax({
                                method: 'POST',
                                url: '{{ url("gsvbb/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_sat', id: element.eq(0).text()},
                                success: function (result) {
                                    if (result === '0') {
                                        newPNotify('info', 'اطلاعات!', "حذف مورد " + element.eq(0).text() + " با مشکل رو به رو شده.");
                                    }
                                    else if (result === '1') {
                                        newPNotify('success', 'کامیابی!', "مورد " + element.eq(0).text() + " با موفقیت از سیستم حذف شد.");
                                        item.remove();
                                    } else if (result === '2') {
                                        newPNotify('error', 'خطا!', 'اجازه حذف مورد را ندارید.');
                                    }
                                },
                                error: function () {
                                    newPNotify('notice', 'هشدار!', "ارتباط شما با سیستم قطع شده لطفا دوباره وارد شوید.");
                                }
                            });
                            Pace.restart();
                        }
                    }
                });
            });
            // delete2 handler function
            $('table tbody .btn-group [name="trash2"]').click(function () {
                item = $(this).parent().parent().parent();
                element = $(this).parent().parent().siblings();
                BootstrapDialog.confirm({
                    title: 'اخطار !',
                    message: 'آیا مطمئن هستید که میخواهید مورد ' + element.eq(0).text() + ' را از سیستم حذف کنید!',
                    type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                    closable: true, // <-- Default value is false
                    draggable: true, // <-- Default value is false
                    btnCancelLabel: 'خیر', // <-- Default value is 'Cancel',
                    btnCancelClass: 'btn-success pull-left', // <-- If you didn't specify it, dialog type will be used,
                    btnOKLabel: 'بلی', // <-- Default value is 'OK',
                    btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
                    btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
                    callback: function (result) {
                        // result will be true if button was click, while it will be false if users close the dialog directly.
                        if (result) {
                            $.ajax({
                                method: 'POST',
                                url: '{{ url("gsvbb/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_mmr', id: element.eq(0).text()},
                                success: function (result) {
                                    if (result === '0') {
                                        newPNotify('info', 'اطلاعات!', "حذف مورد " + element.eq(0).text() + " با مشکل رو به رو شده.");
                                    }
                                    else if (result === '1') {
                                        newPNotify('success', 'کامیابی!', "مورد " + element.eq(0).text() + " با موفقیت از سیستم حذف شد.");
                                        item.remove();
                                    } else if (result === '2') {
                                        newPNotify('error', 'خطا!', 'اجازه حذف مورد را ندارید.');
                                    }
                                },
                                error: function () {
                                    newPNotify('notice', 'هشدار!', "ارتباط شما با سیستم قطع شده لطفا دوباره وارد شوید.");
                                }
                            });
                            Pace.restart();
                        }
                    }
                });
            });

            // edit handler function
            $('table tbody .btn-group [name="edit"]').click(function () {
                element = $(this).parent().parent().siblings();
                $('#DatePicker').attr('value', element.eq(1).text());
                $('#shk').children().each(function () {
                    if ($(this).text() === element.eq(2).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('#nkr').attr('value', element.eq(3).text());
                $('#s').attr('value', element.eq(4).text());
                $('#nq').attr('value', element.eq(5).text());
                $('#d1s').attr('value', element.eq(6).text());
                $('#d1m').attr('value', element.eq(7).text());
                $('#d1l').attr('value', element.eq(8).text());
                $('#d2s').attr('value', element.eq(9).text());
                $('#d2m').attr('value', element.eq(10).text());
                $('#d2l').attr('value', element.eq(11).text());
                $('#d3').attr('value', element.eq(12).text());
                $('#d4').attr('value', element.eq(13).text());
                $('#d5').attr('value', element.eq(14).text());
                $('#mkt').attr('value', element.eq(15).text());
                $('#z').attr('value', element.eq(16).text());
                $('#aq').attr('value', element.eq(17).text());
                $('#aaa').attr('value', element.eq(18).text());
                $('#aks').attr('value', element.eq(19).text());
                $('#aas').attr('value', element.eq(20).text());
                $('#description').attr('value', element.eq(21).text());
                // add new button to form
                $('#box-footer').empty();
                $('#box-footer').append('<button name="action"  type="submit" value="update_snsn" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form').find('input[name="old_id"]').remove();
                $('#form').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form').attr('action', '{{url('gsvbb/update')}}');
                // discard click function
                $('#discard').click(function () {
                    $('#box-footer').empty();
                    $('#box-footer').append('<button name="action"  type="submit" value="create_snsn" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form').find('input[name="old_id"]').remove();
                    $('#DatePicker').removeAttr('value');
                    $('#shk').children().first().prop("selected", true);
                    $('#nkr').removeAttr('value');
                    $('#s').removeAttr('value');
                    $('#nq').removeAttr('value');
                    $('#d1s').removeAttr('value');
                    $('#d1m').removeAttr('value');
                    $('#d1l').removeAttr('value');
                    $('#d2s').removeAttr('value');
                    $('#d2m').removeAttr('value');
                    $('#d2l').removeAttr('value');
                    $('#d3').removeAttr('value');
                    $('#d4').removeAttr('value');
                    $('#d5').removeAttr('value');
                    $('#mkt').removeAttr('value');
                    $('#z').removeAttr('value');
                    $('#aq').removeAttr('value');
                    $('#aaa').removeAttr('value');
                    $('#aks').removeAttr('value');
                    $('#aas').removeAttr('value');
                    $('#description').removeAttr('value');
                    // change url of form
                    $('#form').attr('action', '{{url('gsvbb/create')}}');
                });
            });
            // edit1 handler function
            $('table tbody .btn-group [name="edit1"]').click(function () {
                element = $(this).parent().parent().siblings();
                $('#DatePicker1').attr('value', element.eq(1).text());
                $('#shk1').children().each(function () {
                    if ($(this).text() === element.eq(2).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('#kt1').attr('value', element.eq(3).text());
                $('#khn1').attr('value', element.eq(4).text());
                $('#kgp1').attr('value', element.eq(5).text());
                $('#krm1').attr('value', element.eq(6).text());
                $('#kp1').attr('value', element.eq(7).text());
                $('#ksh1').attr('value', element.eq(8).text());
                $('#kcpk1').attr('value', element.eq(9).text());
                $('#ko1').attr('value', element.eq(10).text());
                $('#ktt1').attr('value', element.eq(11).text());
                $('#qb1').attr('value', element.eq(12).text());
                $('#nk1').attr('value', element.eq(13).text());
                $('#tt1').attr('value', element.eq(14).text());
                $('#kv1').attr('value', element.eq(15).text());
                $('#kk1').attr('value', element.eq(16).text());
                $('#kg1').attr('value', element.eq(17).text());
                $('#ofb1').attr('value', element.eq(18).text());
                $('#ts1').attr('value', element.eq(19).text());
                $('#description1').attr('value', element.eq(20).text());
                // add new button to form
                $('#box-footer1').empty();
                $('#box-footer1').append('<button name="action"  type="submit" value="update_sat" class="btn btn-info">ویرایش</button>\n<button id="discard1" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form1').find('input[name="old_id"]').remove();
                $('#form1').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form1').attr('action', '{{url('gsvbb/update')}}');
                // discard click function
                $('#discard1').click(function () {
                    $('#box-footer1').empty();
                    $('#box-footer1').append('<button name="action"  type="submit" value="create_sat" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form1').find('input[name="old_id"]').remove();
                    $('#DatePicker1').removeAttr('value');
                    $('#shk1').children().first().prop("selected", true);
                    $('#kt1').removeAttr('value');
                    $('#khn1').removeAttr('value');
                    $('#kgp1').removeAttr('value');
                    $('#krm1').removeAttr('value');
                    $('#kp1').removeAttr('value');
                    $('#ksh1').removeAttr('value');
                    $('#kcpk1').removeAttr('value');
                    $('#ko1').removeAttr('value');
                    $('#ktt1').removeAttr('value');
                    $('#qb1').removeAttr('value');
                    $('#nk1').removeAttr('value');
                    $('#tt1').removeAttr('value');
                    $('#kv1').removeAttr('value');
                    $('#kk1').removeAttr('value');
                    $('#kg1').removeAttr('value');
                    $('#ofb1').removeAttr('value');
                    $('#ts1').removeAttr('value');
                    $('#description1').removeAttr('value');
                    // change url of form
                    $('#form1').attr('action', '{{url('gsvbb/create')}}');
                });
            });
            // edit2 handler function
            $('table tbody .btn-group [name="edit2"]').click(function () {
                element = $(this).parent().parent().siblings();
                $('#DatePicker2').attr('value', element.eq(1).text());
                $('#msh2').attr('value', element.eq(2).text());
                $('#mt2').attr('value', element.eq(3).text());
                $('#rl2').attr('value', element.eq(4).text());
                $('#apm2').attr('value', element.eq(5).text());
                $('#nh2').attr('value', element.eq(6).text());
                $('#makd2').attr('value', element.eq(7).text());
                $('#n2').attr('value', element.eq(8).text());
                $('#description2').attr('value', element.eq(9).text());
                // add new button to form
                $('#box-footer2').empty();
                $('#box-footer2').append('<button name="action"  type="submit" value="update_mmr" class="btn btn-info">ویرایش</button>\n<button id="discard2" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form2').find('input[name="old_id"]').remove();
                $('#form2').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form2').attr('action', '{{url('gsvbb/update')}}');
                // discard click function
                $('#discard2').click(function () {
                    $('#box-footer2').empty();
                    $('#box-footer2').append('<button name="action"  type="submit" value="create_mmr" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form2').find('input[name="old_id"]').remove();
                    $('#DatePicker2').removeAttr('value');
                    $('#msh2').removeAttr('value');
                    $('#mt2').removeAttr('value');
                    $('#rl2').removeAttr('value');
                    $('#apm2').removeAttr('value');
                    $('#nh2').removeAttr('value');
                    $('#makd2').removeAttr('value');
                    $('#n2').removeAttr('value');
                    $('#description2').removeAttr('value');
                    // change url of form
                    $('#form2').attr('action', '{{url('gsvbb/create')}}');
                });
            });
            @endif

        });
    </script>
    
    <script src="{{ url('pwt.datepicker-0.4.5/dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
    <script src="{{ url('pwt.datepicker-0.4.5/dist/lib/persian-date.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#DatePicker").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#DatePicker',
                altFormat: "YYYY-MM-DD HH:mm:ss",
            });
            $("#DatePicker1").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#DatePicker1',
                altFormat: "YYYY-MM-DD HH:mm:ss",
            });
            $("#DatePicker2").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#DatePicker2',
                altFormat: "YYYY-MM-DD HH:mm:ss",
            });
        });
    </script>
@endsection
