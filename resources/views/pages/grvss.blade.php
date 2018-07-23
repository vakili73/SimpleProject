@extends('layouts.master')

@section('title', 'ثبت گزارش روزانه واحد سنگ شکن | ')

@section('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ url('pwt.datepicker-0.4.5/dist/css/persian-datepicker-0.4.5.min.css') }}">
@endsection

@section('content')
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form id="form" action="{{ url('grvss/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش روزانه واحد سنگ شکن</h3>

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
                                <label>شیفت</label>
                                <select id="shift" name="shift" class="form-control">
                                        <option value="صبح">صبح</option>
                                        <option value="عصر">عصر</option>
                                        <option value="شب">شب</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>کد فرمول</label>
                                <input id="kf" type="text" class="form-control" name="kf" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>ساعت شروع کار</label>
                                <input id="sshk" type="text" class="form-control" name="sshk" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>ساعت پایان کار</label>
                                <input id="spk" type="text" class="form-control" name="spk" placeholder="">
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
                    <button name="action" type="submit" value="create_sks" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('grvss') }}" method="get">
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
                    <th>شیفت</th>
                    <th>کد فرمول</th>
                    <th>ساعت شروع کار</th>
                    <th>ساعت پایان کار</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shift }}</td>
                        <td>{{ $item->kf }}</td>
                        <td>{{ $item->sshk }}</td>
                        <td>{{ $item->spk }}</td>
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
            <form id="form1" action="{{ url('grvss/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">متراژ خاک سیلوهای پر شده</h3>

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
                                <label>شماره</label>
                                <input id="sh1" type="text" class="form-control" name="sh" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>متراژ</label>
                                <input id="m1" type="text" class="form-control" name="m" placeholder="">
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
                    <button name="action" type="submit" value="create_mksp" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('grvss') }}" method="get">
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
                    <th>شماره</th>
                    <th>متراژ</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data1['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->sh }}</td>
                        <td>{{ $item->m }}</td>
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

        @if ($data['info']->render() != '')
            <div class="box-footer clearfix">
                {!! $data['info']->appends(['search' => $params['search']])->links() !!}
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
                                url: '{{ url("grvss/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_sks', id: element.eq(0).text()},
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
                                url: '{{ url("grvss/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete_mksp', id: element.eq(0).text()},
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
                $('#shift').children().each(function () {
                    if ($(this).text() === element.eq(2).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('#kf').attr('value', element.eq(3).text());
                $('#sshk').attr('value', element.eq(4).text());
                $('#spk').attr('value', element.eq(5).text());
                $('#description').attr('value', element.eq(6).text());
                // add new button to form
                $('#box-footer').empty();
                $('#box-footer').append('<button name="action"  type="submit" value="update_sks" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form').find('input[name="old_id"]').remove();
                $('#form').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form').attr('action', '{{url('grvss/update')}}');
                // discard click function
                $('#discard').click(function () {
                    $('#box-footer').empty();
                    $('#box-footer').append('<button name="action"  type="submit" value="create_sks" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form').find('input[name="old_id"]').remove();
                    $('#DatePicker').removeAttr('value');
                    $('#shift').children().first().prop("selected", true);
                    $('#kf').removeAttr('value');
                    $('#sshk').removeAttr('value');
                    $('#spk').removeAttr('value');
                    $('#description').removeAttr('value');
                    // change url of form
                    $('#form').attr('action', '{{url('grvss/create')}}');
                });
            });
            // edit1 handler function
            $('table tbody .btn-group [name="edit1"]').click(function () {
                element = $(this).parent().parent().siblings();
                $('#DatePicker1').attr('value', element.eq(1).text());
                $('#sh1').attr('value', element.eq(2).text());
                $('#m1').attr('value', element.eq(3).text());
                $('#description1').attr('value', element.eq(4).text());
                // add new button to form
                $('#box-footer1').empty();
                $('#box-footer1').append('<button name="action"  type="submit" value="update_mksp" class="btn btn-info">ویرایش</button>\n<button id="discard1" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('#form1').find('input[name="old_id"]').remove();
                $('#form1').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('#form1').attr('action', '{{url('grvss/update')}}');
                // discard click function
                $('#discard1').click(function () {
                    $('#box-footer1').empty();
                    $('#box-footer1').append('<button name="action"  type="submit" value="create_mksp" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('#form1').find('input[name="old_id"]').remove();
                    $('#DatePicker1').removeAttr('value');
                    $('#sh1').removeAttr('value');
                    $('#m1').removeAttr('value');
                    $('#description1').removeAttr('value');
                    // change url of form
                    $('#form1').attr('action', '{{url('grvss/create')}}');
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
        });
    </script>
@endsection
