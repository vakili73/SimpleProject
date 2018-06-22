<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @yield('meta')

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ url('favicon.png') }}">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap-rtl.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('font-awesome-4.6.3/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('ionicons-2.0.1/css/ionicons.min.css') }}">
    <!-- Pace Page -->
    <link rel="stylesheet" href="{{ url('plugins/pace/pace.min.css') }}"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/AdminLTE-rtl.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('dist/css/skins/skin-blue-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins-rtl.min.css') }}">

    <link rel="stylesheet" href="{{ url('bootstrap3-dialog-1.35.2/dist/css/bootstrap-dialog.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('pnotify-3.0.0/dist/pnotify.css') }}"/>
    <link rel="stylesheet" href="{{ url('pnotify-3.0.0/dist/pnotify.nonblock.css') }}"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.2.3 -->
    <script src="{{ url('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

    @yield('angular')

    @yield('css')

</head>

{{--    {!!  '<div style="direction: ltr">' !!}--}}
{{--    {{ \Symfony\Component\VarDumper\VarDumper::dump(\Session::get('permissions')->toArray()) }}--}}
{{--    {!!  '</div>' !!}--}}

<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        @include('layouts.header')
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        @include('layouts.sidebar')
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="padding-top: 1px;">
    <!-- System Messages -->
        @include('layouts.message')
    <!-- Body Of Content -->
        @include('layouts.content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        @include('layouts.footer')
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="{{ url('bootstrap/js/bootstrap-rtl.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/app.min.js') }}"></script>
<!-- Pace Page -->
<script src="{{ url('plugins/pace/pace.min.js') }}"></script>

<script src="{{ url('bootstrap3-dialog-1.35.2/dist/js/bootstrap-dialog.min.js') }}"></script>
<script src="{{ url('pnotify-3.0.0/dist/pnotify.js') }}"></script>
<script src="{{ url('pnotify-3.0.0/dist/pnotify.nonblock.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        Pace.restart();
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
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

        // profile handler function
        $('#profile').click(function () {
            old_username = '{{\Auth::user()->username}}';
            BootstrapDialog.show({
                title: 'پروفایل !',
                size: BootstrapDialog.SIZE_SMALL,
                message: '<div class="row"><div class="col-sm-12"><div class="form-group has-feedback"><label>نام کاربری</label><input type="text" class="form-control" value="{{ \Auth::user()->username }}" name="username" placeholder="Username"><span class="fa fa-user form-control-feedback"></span></div><!-- /.input group --></div><div class="col-sm-12"><div class="form-group has-feedback"><label>گذرواژه</label><input type="password" class="form-control" name="password" placeholder="Password"><span class="fa fa-lock form-control-feedback"></span></div><!-- /.input group --></div><div class="col-sm-12"><div class="form-group has-feedback"><label>تکرار گذرواژه</label><input type="password" class="form-control" name="password_confirmation" placeholder="Confirmation"><span class="fa fa-lock form-control-feedback"></span></div><!-- /.input group --></div></div>',
                type: BootstrapDialog.TYPE_INFO, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                closable: true, // <-- Default value is false
                draggable: true, // <-- Default value is false
                buttons: [
                    {
                        label: 'لغو',
                        cssClass: 'btn-success pull-left',
                        action: function (dialogRef) {
                            dialogRef.close();
                        }
                    },
                    {
                        label: 'ویرایش',
                        cssClass: 'btn-info pull-right',
                        action: function (dialogRef) {
                            username = dialogRef.getModalBody().find('input[name="username"]').val();
                            password = dialogRef.getModalBody().find('input[name="password"]').val();
                            password_confirmation = dialogRef.getModalBody().find('input[name="password_confirmation"]').val();
                            $.ajax({
                                method: 'POST',
                                url: '{{ url("profile") }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    old_username: old_username,
                                    username: username,
                                    password: password,
                                    password_confirmation: password_confirmation
                                },
                                success: function (result) {
                                    if (result === '0') {
                                        newPNotify('info', 'اطلاعات!', "این کاربر قابل ویرایش نیست!");
                                    }
                                    else if (result === '1') {
                                        newPNotify('success', 'کامیابی!', "پروفایل شما با موفقیت بروز رسانی شد!");
                                        item.remove();
                                    } else if (result === '2') {
                                        newPNotify('error', 'خطا!', 'اجازه حذف کاربر را ندارید.');
                                    }
                                    dialogRef.close();
                                },
                                error: function (result) {
                                    newPNotify('notice', 'هشدار!', "لطفا دوباره امتحان کنید!");
                                }
                            });
                            Pace.restart();
                        }
                    }
                ],
            });
        });
    });
</script>

@yield('script')
</body>
</html>
