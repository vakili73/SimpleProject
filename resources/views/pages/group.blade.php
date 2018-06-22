@extends('layouts.master')

@section('title', 'مدیریت گروهها | SamanRFID')

@section('content')
    @if($onlyBoxInfo)
        <!-- Default box -->
        <div class="box box-primary">
            <form action="{{ url('group/create') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-header with-border">
                    <h3 class="box-title">ایجاد گروه کاربری</h3>

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
                                <label>نام</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                                <span class="fa fa-pencil-square form-control-feedback"></span>
                            </div>
                        </div>
                        @if((\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false))
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group has-feedback">
                                    <label>صفحه خانگی</label>
                                    <select name="home" class="form-control">
                                        @foreach($data['load']['home'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- /.input group -->
                            </div>
                        @endif
                    </div>
                    <h4>دسترسی</h4>

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <button style="width: 166px;" type="button" class="btn btn-info dropdown-toggle"
                                            data-toggle="dropdown">انتخاب
                                        دسترسی <span class="fa fa-caret-down"></span></button>
                                    <input value="" name="menu[]" type="hidden"/>
                                    <ul class="dropdown-menu menu">
                                        @foreach($data['load']['menu'] as $item)
                                            <li value="{{ $item->id }}"><a>{{ $item->alias }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <span class="form-control"
                                      style="height: 48px; padding-top: 14px; padding-right: 20px;">ایجاد</span>

                                <div class="input-group-addon">
                                    <input value="0" type="hidden" name="create[]">
                                    <input name="_create" type="checkbox"/>
                                </div>
                                <span class="form-control"
                                      style="height: 48px; padding-top: 14px; padding-right: 20px;">نمایش</span>

                                <div class="input-group-addon">
                                    <input value="0" type="hidden" name="read[]">
                                    <input name="_read" type="checkbox"/>
                                </div>
                                <span class="form-control"
                                      style="height: 48px; padding-top: 14px; padding-right: 20px;">حذف</span>

                                <div class="input-group-addon">
                                    <input value="0" type="hidden" name="delete[]">
                                    <input name="_delete" type="checkbox"/>
                                </div>
                                <span class="form-control"
                                      style="height: 48px; padding-top: 14px; padding-right: 20px;">ویرایش</span>

                                <div class="input-group-addon">
                                    <input value="0" type="hidden" name="update[]">
                                    <input name="_update" type="checkbox"/>
                                </div>
                                <div class="input-group-addon">
                                    <button type="button" class="btn btn-primary plus"><span class="fa fa-plus"></span>
                                    </button>
                                </div>
                                <input type="hidden">
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
                اطلاعات کاربران
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools" style="left: 165px;">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Help">
                    <i class="fa fa-question"></i></button>
            </div>
            <!-- /. tools -->
            <div class="box-tools">
                <form action="{{ url('group') }}" method="get">
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
                    @if((\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false))
                        <th>داشبورد</th>
                    @endif
                    <th>دسترسی</th>
                    <th>ایجاد</th>
                    <th>نمایش</th>
                    <th>حذف</th>
                    <th>ویرایش</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['info'] as $item)
                    <tr>
                        <td>{{ $item->group->name }}</td>
                        @if((\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false))
                            <td>{{ $item->group->home->name }}</td>
                        @endif
                        <td>{{ $item->menu->alias }}</td>
                        @if ($item->create == '1')
                            <td><span class="label label-info">مجاز</span></td>
                        @elseif($item->create == '0')
                            <td><span class="label label-warning">غیر مجاز</span></td>
                        @endif
                        @if ($item->read == '1')
                            <td><span class="label label-info">مجاز</span></td>
                        @elseif($item->read == '0')
                            <td><span class="label label-warning">غیر مجاز</span></td>
                        @endif
                        @if ($item->delete == '1')
                            <td><span class="label label-info">مجاز</span></td>
                        @elseif($item->delete == '0')
                            <td><span class="label label-warning">غیر مجاز</span></td>
                        @endif
                        @if ($item->update == '1')
                            <td><span class="label label-info">مجاز</span></td>
                        @elseif($item->update == '0')
                            <td><span class="label label-warning">غیر مجاز</span></td>
                        @endif
                        <td>
                            @if( $item->grant != $groupGrant)
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

            // menu select dropdown handler
            $('.box-primary').on('click', 'li[value]', function () {
                        Button_ = $(this).parent().siblings().eq(0);
                        Value_ = $(this).attr('value');
                        Input_ = $(this).parent().siblings().eq(1);
                        Anchor_ = $(this).children().eq(0);
                        $(Input_).prop('value', Value_);
                        $(Button_).html($(Anchor_).text());
                    }
            );

            // checkbox button control
            $('.box-primary').on('change', 'input[type="checkbox"]', function () {
                input_hidden = $(this).siblings();
                if (this.checked) {
                    $(input_hidden).prop('value', '1');
//                    alert('checked');
                } else {
                    $(input_hidden).prop('value', '0');
//                    alert('uncecked');
                }
            });

            // minus button control
            $('.box-primary').on('click', '.minus', function () {
                $(this).parent().parent().parent().remove();
            });

            // plus button control
            $('.box-primary').on('click', '.plus', function () {
                Col_ = $(this).parent().parent().parent();
                Row_ = $(this).parent().parent().parent().parent();
                $(Row_).append($(Col_)[0].outerHTML);
                Span_ = $(this).children();
                $(Span_).removeClass('fa-plus');
                $(Span_).addClass('fa-minus');
                $(this).addClass('btn-danger');
                $(this).removeClass('btn-primary');
                $(this).addClass('minus');
                $(this).removeClass('plus');
            });

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
                    message: 'آیا مطمئن هستید که میخواهید گروه ' + element.eq(0).text() + ' با دسترسی ' + element.eq(1).text() + ' را از سیستم حذف کنید!',
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
                                url: '{{ url("group/delete") }}',
                                @if((\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false))
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    action: 'delete',
                                    permission: element.eq(2).text(),
                                    group: element.eq(0).text()
                                },
                                @else
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    action: 'delete',
                                    permission: element.eq(1).text(),
                                    group: element.eq(0).text()
                                },
                                @endif
                                success: function (result) {
                                    if (result === '0') {
                                        newPNotify('info', 'اطلاعات!', "حذف گروه " + element.eq(0).text() + " با مشکل رو به رو شده.");
                                    }
                                    else if (result === '1') {
                                        newPNotify('success', 'کامیابی!', "گروه " + element.eq(0).text() + " با موفقیت از سیستم حذف شد.");
                                        item.remove();
                                    } else if (result === '2') {
                                        newPNotify('error', 'خطا!', 'اجازه حذف گروه را ندارید.');
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
                @if((\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false))
                $('[name="home"]').children().each(function () {
                    if ($(this).text() === element.eq(1).text()) {
                        $(this).prop("selected", true);
                    }
                });
                perm = element.eq(2);
                @else
                        perm = element.eq(1);
                @endif

                        Button_ = $('li[value]').parent().siblings().eq(0);
                $(Button_).html($(perm).text());
                $(Button_).prop('disabled', 'disabled');
                $('.plus').prop('disabled', 'disabled');
                $('.menu').children().each(function () {
                    if ($(this).children().eq(0).text() === $(perm).text()) {
                        Value_ = $(this).attr('value');
                        Input_ = $('li[value]').parent().siblings().eq(1);
                        $(Input_).prop('value', Value_);
                    }
                });

                @if((\Auth::user()->id == '1' ? true : false) && (\Auth::user()->grant == '0' ? true : false))
                        _create = element.eq(4).text() === 'مجاز' ? 1 : 0;
                _read = element.eq(4).text() === 'مجاز' ? 1 : 0;
                _delete = element.eq(5).text() === 'مجاز' ? 1 : 0;
                _update = element.eq(6).text() === 'مجاز' ? 1 : 0;
                @else
                        _create = element.eq(2).text() === 'مجاز' ? 1 : 0;
                _read = element.eq(3).text() === 'مجاز' ? 1 : 0;
                _delete = element.eq(4).text() === 'مجاز' ? 1 : 0;
                _update = element.eq(5).text() === 'مجاز' ? 1 : 0;
                @endif

                $('[name="create[]"]').attr('value', _create);
                if (_create === 1)
                    $('[name="_create"]').attr('checked', 'checked');
                $('[name="read[]"]').attr('value', _read);
                if (_read === 1)
                    $('[name="_read"]').attr('checked', 'checked');
                $('[name="delete[]"]').attr('value', _delete);
                if (_delete === 1)
                    $('[name="_delete"]').attr('checked', 'checked');
                $('[name="update[]"]').attr('value', _update);
                if (_update === 1)
                    $('[name="_update"]').attr('checked', 'checked');

                // add new button to form
                $('.box-primary .box-footer').empty();
                $('.box-primary .box-footer').append('<button name="action"  type="submit" value="update" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
                // change box title
                $('.box-primary .box-title').text('ویرایش گروه کاربری');
                // add old email to form as hidden field
                $('.box-primary form').find('input[name="old_name"]').remove();
                $('.box-primary form').append('<input name="old_name" value="' + element.eq(0).text() + '" type="hidden">');// change url of form
                $('.box-primary form').attr('action', '{{url('group/update')}}');
                // discard click function
                $('#discard').click(function () {
                    $('.box-primary .box-footer').empty();
                    $('.box-primary .box-footer').append('<button name="action"  type="submit" value="create" class="btn btn-primary">افزودن</button>');
                    // reset form
                    $('.box-primary form').find('input[name="old_name"]').remove();
                    $('[name="name"]').removeAttr('value');
                    $('[name="home"]').children().first().prop("selected", true);
                    $('.box-primary .box-title').text('ایجاد گروه کاربری');
                    Button_ = $('li[value]').parent().siblings().eq(0);
                    $(Button_).html('انتخاب دسترسی <span class="fa fa-caret-down"></span>');
                    $(Button_).removeAttr('disabled');
                    $('.plus').removeAttr('disabled');
                    $('[name="create[]"]').attr('value', 0);
                    $('[name="_create"]').removeAttr('checked');
                    $('[name="read[]"]').attr('value', 0);
                    $('[name="_read"]').removeAttr('checked');
                    $('[name="delete[]"]').attr('value', 0);
                    $('[name="_delete"]').removeAttr('checked');
                    $('[name="update[]"]').attr('value', 0);
                    $('[name="_update"]').removeAttr('checked');
                    // change url of form
                    $('.box-primary form').attr('action', '{{url('group/create')}}');
                });
            });
            @endif


        });
    </script>
@endsection
