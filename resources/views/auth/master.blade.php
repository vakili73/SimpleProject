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
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('dist/css/AdminLTE-rtl.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ url('plugins/iCheck/square/blue.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('css')

    </head>
    <body class="hold-transition login-page">

        @yield('body')

        <!-- jQuery 2.1.4 -->
        <script src="{{ url('plugins/jQuery/jQuery-2.2.3.min.js') }}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ url('bootstrap/js/bootstrap-rtl.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ url('plugins/iCheck/icheck.min.js') }}"></script>
        
        <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
        </script>
        
        @yield('script')
        
    </body>
</html>