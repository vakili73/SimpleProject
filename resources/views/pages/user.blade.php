@extends('layouts.master')

@section('title', 'مدیریت کاربران | SamanRFID')

@section('content')
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form action="{{ url('user/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن کاربر جدید</h3>

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
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نام</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                                <span class="fa fa-pencil-square form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نام خانوادگی</label>
                                <input type="text" class="form-control" name="family" placeholder="Family">
                                <span class="fa fa-pencil-square form-control-feedback"></span>
                            </div><!-- /.input group -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>نام کاربری</label>
                                <input type="text" class="form-control" name="username" placeholder="Username"
                                       required="">
                                <span class="fa fa-user form-control-feedback"></span>
                            </div><!-- /.input group -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>سمت </label>
                                <input type="text" class="form-control" name="position" placeholder="Position"
                                       required="">
                                <span class="fa fa-sitemap form-control-feedback"></span>
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>گذرواژه</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                       required="">
                                <span class="fa fa-lock form-control-feedback"></span>
                            </div><!-- /.input group -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group has-feedback">
                                <label>تکرار گذرواژه</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Confirmation"
                                       required="">
                                <span class="fa fa-lock form-control-feedback"></span>
                            </div><!-- /.input group -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>وضعیت</label>
                                <select name="state" class="form-control">
                                    <option value="1" selected>فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>گروه کاربری</label>
                                <select name="group" class="form-control">
                                    @foreach($user['load']['group'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
    {{--{{ \Symfony\Component\VarDumper\VarDumper::dump(\Session::get('permissions')) }}--}}
    {{--{!! '</div>' !!}--}}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">
                اطلاعات کاربران
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools" style="left: 165px;">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Help">
                    <i class="fa fa-question"></i></button>
            </div>
            <!-- /. tools -->
            <div class="box-tools">
                <form action="{{ url('user') }}" method="get">
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
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نام کاربری</th>
                    <th>سمت</th>
                    <th>وضعیت</th>
                    <th>گروه کاربری</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($user['info'] as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->family }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->position }}</td>
                        @if ($item->state == '1')
                            <td><span class="label label-info">فعال</span></td>
                        @elseif($item->state == '0')
                            <td><span class="label label-warning">غیر فعال</span></td>
                        @endif
                        <td>{{ $item->group->name }}</td>
                        <td>
                            @if( $item->username != \Auth::user()->username)
                                <div class="btn-group">
                                    <button name="trash" type="button" class="btn btn-warning btn-xs"><i
                                                class="fa fa-trash"></i>
                                    </button>
                                    <button name="edit" type="button" class="btn btn-info btn-xs"><i
                                                class="fa fa-edit"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if ($user['info']->render() != '')
            <div class="box-footer clearfix">
                {!! $user['info']->appends(['search' => $params['search']])->links() !!}
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
                    message: 'آیا مطمئن هستید که میخواهید کاربر ' + element.eq(0).text() + ' با نام کاربری ' + element.eq(2).text() + ' را از سیستم حذف کنید!',
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
                                url: '{{ url("user/delete") }}',
                                data: {_token: '{{ csrf_token() }}', action: 'delete', username: element.eq(2).text()},
                                success: function (result) {
                                    if (result === '0') {
                                        newPNotify('info', 'اطلاعات!', "حذف کاربر " + element.eq(0).text() + " با مشکل رو به رو شده.");
                                    }
                                    else if (result === '1') {
                                        newPNotify('success', 'کامیابی!', "کاربر " + element.eq(0).text() + " با موفقیت از سیستم حذف شد.");
                                        item.remove();
                                    } else if (result === '2') {
                                        newPNotify('error', 'خطا!', 'اجازه حذف کاربر را ندارید.');
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
                $('[name="name"]').attr('value', element.eq(0).text());
                $('[name="family"]').attr('value', element.eq(1).text());
                $('[name="username"]').attr('value', element.eq(2).text());
                $('[name="position"]').attr('value', element.eq(3).text());
                $('[name="state"]').children().each(function () {
                    if ($(this).text() === element.eq(4).text()) {
                        $(this).prop("selected", true);
                    }
                });
                $('[name="group"]').children().each(function () {
                    if ($(this).text() === element.eq(5).text()) {
                        $(this).prop("selected", true);
                    }
                });
                // add new button to form
                $('.box-primary .box-footer').empty();
                $('.box-primary .box-footer').append('<button name="action"  type="submit" value="update" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
                // add old email to form as hidden field
                $('.box-primary form').find('input[name="old_username"]').remove();
                $('.box-primary form').append('<input name="old_username" value="' + element.eq(2).text() + '" type="hidden">');
                // change box title
                $('.box-primary .box-title').text('ویرایش کاربر');
                // change url of form
                $('.box-primary form').attr('action', '{{url('user/update')}}');
//                console.debug($('.box-primary form'));
                // discard click function
                $('#discard').click(function () {
                    $('.box-primary .box-footer').empty();
                    $('.box-primary .box-footer').append('<button name="action"  type="submit" value="create" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('.box-primary form').find('input[name="old_username"]').remove();
                    $('[name="name"]').removeAttr('value');
                    $('[name="family"]').removeAttr('value');
                    $('[name="username"]').removeAttr('value');
                    $('[name="position"]').removeAttr('value');
                    $('[name="state"]').children().first().prop("selected", true);
                    $('[name="group"]').children().first().prop("selected", true);
                    $('.box-primary .box-title').text('افزودن کاربر جدید');
                    // change url of form
                    $('.box-primary form').attr('action', '{{url('user/create')}}');
                });
            });
            @endif

        });
    </script>
@endsection
