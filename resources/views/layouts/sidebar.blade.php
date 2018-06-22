<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-right image">
            <img src="{{ url('dist/img/avatar.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ \Auth::user()->name }} {{ \Auth::user()->family }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ $route == 'home' ? 'active':'' }}">
            <a href="{{ url('home') }}">
                <i class="fa fa-dashboard"></i> <span>داشبورد</span>
            </a>
        </li>
        @foreach(\Auth::user()->group->menus as $menu)
            <li class="{{ $route == $menu->name ? 'active':'' }}">
                <a href="{{ url($menu->name) }}">
                    <i class="fa fa-{{ $menu->icon }}"></i> <span>{{ $menu->alias }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
<!-- /.sidebar -->