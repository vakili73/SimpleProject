@extends('layouts.master')

@section('title', 'ثبت گزارش روزانه توقفات واحد سنگ شکن | ')

@section('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ url('pwt.datepicker-0.4.5/dist/css/persian-datepicker-0.4.5.min.css') }}">
@endsection

@section('content')
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form action="{{ url('grtvss/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت گزارش روزانه توقفات واحد سنگ شکن</h3>

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
                                <select name="shift" class="form-control">
                                        <option value="صبح">صبح</option>
                                        <option value="عصر">عصر</option>
                                        <option value="شب">شب</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خرابی نوار نقاله</label>
                                <input type="text" class="form-control" name="khbnvn" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خ س.ش فکی</label>
                                <input type="text" class="form-control" name="khbsngsf" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خ س.ش چکشی</label>
                                <input type="text" class="form-control" name="khbsngsch" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>ت توری و سرند</label>
                                <input type="text" class="form-control" name="tts" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خ موتور</label>
                                <input type="text" class="form-control" name="km" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خ رولیک</label>
                                <input type="text" class="form-control" name="kr" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>خ لودر</label>
                                <input type="text" class="form-control" name="kl" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نظافت</label>
                                <input type="text" class="form-control" name="n" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>سایر</label>
                                <input type="text" class="form-control" name="s" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>توضیحات</label>
                                <input type="text" class="form-control" name="description" placeholder="">
                                <span class="fa fa-bolt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button name="action" type="submit" value="create" class="btn btn-primary">افزودن</button>
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
                <form action="{{ url('grtvss') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input name="search" class="form-control pull-right" placeholder="Search" type="text">

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
                    <th>خ نوار نقاله</th>
                    <th>خ س.ش فکی</th>
                    <th>خ س.ش چکشی</th>
                    <th>ت توری و سرند</th>
                    <th>خ موتور</th>
                    <th>خ رولیک</th>
                    <th>خ لودر</th>
                    <th>نظافت</th>
                    <th>سایر</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['info'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->datetime }}</td>
                        <td>{{ $item->shift }}</td>
                        <td>{{ $item->khbnvn }}</td>
                        <td>{{ $item->khbsngsf }}</td>
                        <td>{{ $item->khbsngsch }}</td>
                        <td>{{ $item->tts }}</td>
                        <td>{{ $item->km }}</td>
                        <td>{{ $item->kr }}</td>
                        <td>{{ $item->kl }}</td>
                        <td>{{ $item->n }}</td>
                        <td>{{ $item->s }}</td>
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
                                url: '{{ url("grtvss/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete', id: element.eq(0).text()},
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
                $('[name="datetime"]').attr('value', element.eq(1).text());
                $('[name="shift"]').children().each(function () {
                    if ($(this).text() === element.eq(2).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('[name="khbnvn"]').attr('value', element.eq(3).text());
                $('[name="khbsngsf"]').attr('value', element.eq(4).text());
                $('[name="khbsngsch"]').attr('value', element.eq(5).text());
                $('[name="tts"]').attr('value', element.eq(6).text());
                $('[name="km"]').attr('value', element.eq(7).text());
                $('[name="kr"]').attr('value', element.eq(8).text());
                $('[name="kl"]').attr('value', element.eq(9).text());
                $('[name="n"]').attr('value', element.eq(10).text());
                $('[name="s"]').attr('value', element.eq(11).text());
                $('[name="description"]').attr('value', element.eq(12).text());
                // add new button to form
                $('.box-primary .box-footer').empty();
                $('.box-primary .box-footer').append('<button name="action"  type="submit" value="update" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('.box-primary form').find('input[name="old_id"]').remove();
                $('.box-primary form').append('<input name="old_id" value="' + element.eq(0).text() + '" type="hidden">');
                // change url of form
                $('.box-primary form').attr('action', '{{url('grtvss/update')}}');
                //                console.debug($('.box-primary form'));
                // discard click function
                $('#discard').click(function () {
                    $('.box-primary .box-footer').empty();
                    $('.box-primary .box-footer').append('<button name="action"  type="submit" value="create" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('.box-primary form').find('input[name="old_id"]').remove();
                    $('[name="datetime"]').removeAttr('value');
                    $('[name="shift"]').children().first().prop("selected", true);
                    $('[name="khbnvn"]').removeAttr('value');
                    $('[name="khbsngsf"]').removeAttr('value');
                    $('[name="khbsngsch"]').removeAttr('value');
                    $('[name="tts"]').removeAttr('value');
                    $('[name="km"]').removeAttr('value');
                    $('[name="kr"]').removeAttr('value');
                    $('[name="kl"]').removeAttr('value');
                    $('[name="n"]').removeAttr('value');
                    $('[name="s"]').removeAttr('value');
                    $('[name="description"]').removeAttr('value');
                    // change url of form
                    $('.box-primary form').attr('action', '{{url('grtvss/create')}}');
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
        });
    </script>
@endsection
