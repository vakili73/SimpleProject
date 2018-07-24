@extends('layouts.master')

@section('title', 'گزارش شیفت واحد پرس | ')

@section('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ url('pwt.datepicker-0.4.5/dist/css/persian-datepicker-0.4.5.min.css') }}">
@endsection

@section('content')
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form id="form" action="{{ url('gsvp/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش شیفت واحد پرس</h3>

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
                                <label>شماره پرس</label>
                                <select id="shp" name="shp" class="form-control">
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
                                <label>سایز</label>
                                <input id="s" type="text" class="form-control" name="s" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>سیکل پرس</label>
                                <input id="sp" type="text" class="form-control" name="sp" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نوع پانچ</label>
                                <input id="np" type="text" class="form-control" name="np" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تعداد ضربه</label>
                                <input id="tz" type="text" class="form-control" name="tz" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>راندمان پرس</label>
                                <input id="rp" type="text" class="form-control" name="rp" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>متراژ تولید</label>
                                <input id="kl" type="text" class="form-control" name="kl" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>مقدار ضایعات</label>
                                <input id="mz" type="text" class="form-control" name="mz" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>علت</label>
                                <input id="a" type="text" class="form-control" name="a" placeholder="">
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
                    <button name="action" type="submit" value="create_sssn" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('gsvp') }}" method="get">
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
                    <th>شماره پرس</th>
                    <th>سایز</th>
                    <th>سیکل پرس</th>
                    <th>نوع پانچ</th>
                    <th>تعداد ضربه</th>
                    <th>راندمان پرس</th>
                    <th>متراژ تولید</th>
                    <th>مقدار ضایعات</th>
                    <th>علت</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shp }}</td>
                        <td>{{ $item->s }}</td>
                        <td>{{ $item->sp }}</td>
                        <td>{{ $item->np }}</td>
                        <td>{{ $item->tz }}</td>
                        <td>{{ $item->rp }}</td>
                        <td>{{ $item->mt }}</td>
                        <td>{{ $item->mz }}</td>
                        <td>{{ $item->a }}</td>
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
            <form id="form1" action="{{ url('gsvp/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش شیفت واحد پرس</h3>

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
                                <label>نظافت پانچ</label>
                                <input id="np1" type="text" class="form-control" name="np" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>فیلر گیری</label>
                                <input id="fg1" type="text" class="form-control" name="fg" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توقفات داخلی</label>
                                <input id="td1" type="text" class="form-control" name="td" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>اختلال درایر</label>
                                <input id="ad1" type="text" class="form-control" name="ad" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>رفع اختلال سایز</label>
                                <input id="ras1" type="text" class="form-control" name="ras" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تغییر سایز</label>
                                <input id="ts1" type="text" class="form-control" name="ts" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تعویض قالب</label>
                                <input id="tq1" type="text" class="form-control" name="tq" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تعویض آینه و مارک</label>
                                <input id="tam1" type="text" class="form-control" name="tam" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خط لعاب</label>
                                <input id="kl1" type="text" class="form-control" name="kl" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توقف خاک</label>
                                <input id="tk1" type="text" class="form-control" name="tk" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>کنترل کیفی</label>
                                <input id="kk1" type="text" class="form-control" name="kk" placeholder="">
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
                    <button name="action" type="submit" value="create_snft" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('gsvp') }}" method="get">
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
                    <th>نظافت پانچ</th>
                    <th>فیلر گیری</th>
                    <th>توقفات داخلی</th>
                    <th>اختلال درایر</th>
                    <th>رفع اختلاف سایز</th>
                    <th>تغییر سایز</th>
                    <th>تعویض قالب</th>
                    <th>تعویض آینه و مارک</th>
                    <th>خط لعاب</th>
                    <th>توقف خاک</th>
                    <th>کنترل کیفی</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data1['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shk }}</td>
                        <td>{{ $item->np }}</td>
                        <td>{{ $item->fg }}</td>
                        <td>{{ $item->td }}</td>
                        <td>{{ $item->ad }}</td>
                        <td>{{ $item->ras }}</td>
                        <td>{{ $item->ts }}</td>
                        <td>{{ $item->tq }}</td>
                        <td>{{ $item->tam }}</td>
                        <td>{{ $item->kl }}</td>
                        <td>{{ $item->tk }}</td>
                        <td>{{ $item->kk }}</td>
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
            <form id="form2" action="{{ url('gsvp/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش شیفت واحد پرس</h3>

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
                                <label>شماره خط</label>
                                <select id="shk2" name="shk" class="form-control">
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
                                <label>برق</label>
                                <input id="b2" type="text" class="form-control" name="b" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>الکترونیک</label>
                                <input id="a2" type="text" class="form-control" name="a" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>مکانیک</label>
                                <input id="m2" type="text" class="form-control" name="m" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>جوشکاری</label>
                                <input id="j2" type="text" class="form-control" name="j" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>سرویس کاری</label>
                                <input id="s2" type="text" class="form-control" name="s" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>قطع برق</label>
                                <input id="qb2" type="text" class="form-control" name="qb" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>قطع گاز</label>
                                <input id="qg2" type="text" class="form-control" name="qg" placeholder="">
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
                    <button name="action" type="submit" value="create_stt" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('gsvp') }}" method="get">
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
                    <th>شماره خط</th>
                    <th>برق</th>
                    <th>الکترونیک</th>
                    <th>مکانیک</th>
                    <th>جوشکاری</th>
                    <th>سرویس کاری</th>
                    <th>قطع برق</th>
                    <th>قطع گاز</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data2['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shk }}</td>
                        <td>{{ $item->b }}</td>
                        <td>{{ $item->a }}</td>
                        <td>{{ $item->m }}</td>
                        <td>{{ $item->j }}</td>
                        <td>{{ $item->s }}</td>
                        <td>{{ $item->qb }}</td>
                        <td>{{ $item->qg }}</td>
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
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form id="form3" action="{{ url('gsvp/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش شیفت واحد پرس</h3>

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
                                <input id="DatePicker3" type="text" class="form-control" name="datetime"
                                    style="direction: ltr;" placeholder="Date">
                                <span class="fa fa-calendar form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>همکاران</label>
                                <input id="h3" type="text" class="form-control" name="h" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>اقدامات انجام شده</label>
                                <input id="aa3" type="text" class="form-control" name="aa" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تعمیرات صورت گرفته</label>
                                <input id="ts3" type="text" class="form-control" name="ts" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>مناطق نظافت</label>
                                <input id="mn3" type="text" class="form-control" name="mn" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>میزان آب مخزن چیلر</label>
                                <input id="mam3" type="text" class="form-control" name="mam" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توضیحات</label>
                                <input id="description3" type="text" class="form-control" name="description" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div id="box-footer3" class="box-footer">
                    <button name="action" type="submit" value="create_hma" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('gsvp') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input name="search" class="form-control pull-right" placeholder="Search" type="text">
                        <input name="sv" value="search3" type="hidden">
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
                    <th>همکاران</th>
                    <th>اقدامات انجام شده</th>
                    <th>تعمیرات صورت گرفته</th>
                    <th>مناطق نظافت</th>
                    <th>میزان آب مخزن چیلر</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data3['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->h }}</td>
                        <td>{{ $item->aa }}</td>
                        <td>{{ $item->ts }}</td>
                        <td>{{ $item->mn }}</td>
                        <td>{{ $item->mam }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="btn-group">
                                <button name="trash3" type="button" class="btn btn-warning btn-xs"><i
                                            class="fa fa-trash"></i>
                                </button>
                                <button name="edit3" type="button" class="btn btn-info btn-xs"><i
                                            class="fa fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if ($data3['info']->render() != '')
            <div class="box-footer clearfix">
                {!! $data3['info']->appends(['search' => $params['search']])->links() !!}
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
                                url: '{{ url("gsvp/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_sssn', id: element.eq(0).text()},
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
                                url: '{{ url("gsvp/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_snft', id: element.eq(0).text()},
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
                                url: '{{ url("gsvp/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_stt', id: element.eq(0).text()},
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
            // delete3 handler function
            $('table tbody .btn-group [name="trash3"]').click(function () {
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
                                url: '{{ url("gsvp/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_hma', id: element.eq(0).text()},
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
                $('#shp').children().each(function () {
                    if ($(this).text() === element.eq(2).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('#s').attr('value', element.eq(3).text());
                $('#sp').attr('value', element.eq(4).text());
                $('#np').attr('value', element.eq(5).text());
                $('#tz').attr('value', element.eq(6).text());
                $('#rp').attr('value', element.eq(7).text());
                $('#mt').attr('value', element.eq(8).text());
                $('#mz').attr('value', element.eq(9).text());
                $('#a').attr('value', element.eq(10).text());
                $('#description').attr('value', element.eq(11).text());
                // add new button to form
                $('#box-footer').empty();
                $('#box-footer').append('<button name="action"  type="submit" value="update_sssn" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form').find('input[name="old_id"]').remove();
                $('#form').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form').attr('action', '{{url('gsvp/update')}}');
                // discard click function
                $('#discard').click(function () {
                    $('#box-footer').empty();
                    $('#box-footer').append('<button name="action"  type="submit" value="create_sssn" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form').find('input[name="old_id"]').remove();
                    $('#DatePicker').removeAttr('value');
                    $('#shp').children().first().prop("selected", true);
                    $('#s').removeAttr('value');
                    $('#sp').removeAttr('value');
                    $('#np').removeAttr('value');
                    $('#tz').removeAttr('value');
                    $('#rp').removeAttr('value');
                    $('#mt').removeAttr('value');
                    $('#mz').removeAttr('value');
                    $('#a').removeAttr('value');
                    $('#description').removeAttr('value');
                    // change url of form
                    $('#form').attr('action', '{{url('gsvp/create')}}');
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
                $('#np1').attr('value', element.eq(3).text());
                $('#fg1').attr('value', element.eq(4).text());
                $('#td1').attr('value', element.eq(5).text());
                $('#ad1').attr('value', element.eq(6).text());
                $('#ras1').attr('value', element.eq(7).text());
                $('#ts1').attr('value', element.eq(8).text());
                $('#tq1').attr('value', element.eq(9).text());
                $('#tam1').attr('value', element.eq(10).text());
                $('#kl1').attr('value', element.eq(11).text());
                $('#tk1').attr('value', element.eq(12).text());
                $('#kk1').attr('value', element.eq(13).text());
                $('#description1').attr('value', element.eq(14).text());
                // add new button to form
                $('#box-footer1').empty();
                $('#box-footer1').append('<button name="action"  type="submit" value="update_snft" class="btn btn-info">ویرایش</button>\n<button id="discard1" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form1').find('input[name="old_id"]').remove();
                $('#form1').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form1').attr('action', '{{url('gsvp/update')}}');
                // discard click function
                $('#discard1').click(function () {
                    $('#box-footer1').empty();
                    $('#box-footer1').append('<button name="action"  type="submit" value="create_snft" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form1').find('input[name="old_id"]').remove();
                    $('#DatePicker1').removeAttr('value');
                    $('#shk1').children().first().prop("selected", true);
                    $('#np1').removeAttr('value');
                    $('#fg1').removeAttr('value');
                    $('#td1').removeAttr('value');
                    $('#ad1').removeAttr('value');
                    $('#ras1').removeAttr('value');
                    $('#ts1').removeAttr('value');
                    $('#tq1').removeAttr('value');
                    $('#tam1').removeAttr('value');
                    $('#kl1').removeAttr('value');
                    $('#tk1').removeAttr('value');
                    $('#kk1').removeAttr('value');
                    $('#description1').removeAttr('value');
                    // change url of form
                    $('#form1').attr('action', '{{url('gsvp/create')}}');
                });
            });
            // edit2 handler function
            $('table tbody .btn-group [name="edit2"]').click(function () {
                element = $(this).parent().parent().siblings();
                $('#DatePicker2').attr('value', element.eq(1).text());
                $('#shk2').children().each(function () {
                    if ($(this).text() === element.eq(2).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('#b2').attr('value', element.eq(3).text());
                $('#a2').attr('value', element.eq(4).text());
                $('#m2').attr('value', element.eq(5).text());
                $('#j2').attr('value', element.eq(6).text());
                $('#s2').attr('value', element.eq(7).text());
                $('#qb2').attr('value', element.eq(8).text());
                $('#qg2').attr('value', element.eq(9).text());
                $('#description2').attr('value', element.eq(10).text());
                // add new button to form
                $('#box-footer2').empty();
                $('#box-footer2').append('<button name="action"  type="submit" value="update_stt" class="btn btn-info">ویرایش</button>\n<button id="discard2" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form2').find('input[name="old_id"]').remove();
                $('#form2').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form2').attr('action', '{{url('gsvp/update')}}');
                // discard click function
                $('#discard2').click(function () {
                    $('#box-footer2').empty();
                    $('#box-footer2').append('<button name="action"  type="submit" value="create_stt" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form2').find('input[name="old_id"]').remove();
                    $('#DatePicker2').removeAttr('value');
                    $('#shk2').children().first().prop("selected", true);
                    $('#b2').removeAttr('value');
                    $('#a2').removeAttr('value');
                    $('#m2').removeAttr('value');
                    $('#j2').removeAttr('value');
                    $('#s2').removeAttr('value');
                    $('#qb2').removeAttr('value');
                    $('#qg2').removeAttr('value');
                    $('#description2').removeAttr('value');
                    // change url of form
                    $('#form2').attr('action', '{{url('gsvp/create')}}');
                });
            });
            // edit3 handler function
            $('table tbody .btn-group [name="edit3"]').click(function () {
                element = $(this).parent().parent().siblings();
                $('#DatePicker3').attr('value', element.eq(1).text());
                $('#h3').attr('value', element.eq(2).text());
                $('#aa3').attr('value', element.eq(3).text());
                $('#ts3').attr('value', element.eq(4).text());
                $('#mn3').attr('value', element.eq(5).text());
                $('#mam3').attr('value', element.eq(6).text());
                $('#description3').attr('value', element.eq(7).text());
                // add new button to form
                $('#box-footer3').empty();
                $('#box-footer3').append('<button name="action"  type="submit" value="update_hma" class="btn btn-info">ویرایش</button>\n<button id="discard3" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form3').find('input[name="old_id"]').remove();
                $('#form3').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form3').attr('action', '{{url('gsvp/update')}}');
                // discard click function
                $('#discard3').click(function () {
                    $('#box-footer3').empty();
                    $('#box-footer3').append('<button name="action"  type="submit" value="create_hma" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form3').find('input[name="old_id"]').remove();
                    $('#DatePicker3').removeAttr('value');
                    $('#h3').removeAttr('value');
                    $('#aa3').removeAttr('value');
                    $('#ts3').removeAttr('value');
                    $('#mn3').removeAttr('value');
                    $('#mam3').removeAttr('value');
                    $('#description3').removeAttr('value');
                    // change url of form
                    $('#form3').attr('action', '{{url('gsvp/create')}}');
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
            $("#DatePicker3").persianDatepicker({
                timePicker: {
                    enabled: true
                },
                altField: '#DatePicker3',
                altFormat: "YYYY-MM-DD HH:mm:ss",
            });
        });
    </script>
@endsection
