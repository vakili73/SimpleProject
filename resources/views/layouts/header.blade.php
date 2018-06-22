<!-- Logo -->
<a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>R</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Saman</b>RFID</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ url('dist/img/avatar.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ \Auth::user()->name }} {{ \Auth::user()->family }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ url('dist/img/avatar.png') }}" class="img-circle" alt="User Image">

                        <p>
                            {{ \Auth::user()->name }} {{ \Auth::user()->family }}
                            <small>{{ \Auth::user()->group->name }} <span class="glyphicon glyphicon-option-vertical"></span> {{ \Auth::user()->position }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ url('logout') }}" class="btn btn-default btn-flat">خروج</a>
                        </div>
                        <div class="pull-right">
                            <a id="profile" class="btn btn-default btn-flat">پروفایل</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>