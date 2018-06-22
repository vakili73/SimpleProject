<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @if($route != 'home')
            @foreach(\Auth::user()->group->menus as $menu)
                {{ $route == $menu->name ? $menu->alias : '' }}
            @endforeach
        @else
            داشبورد
        @endif
        @if($route != 'home')
            <small>افزودن / ویرایش</small>
        @else
            <small>صفحه خانگی</small>
        @endif
    </h1>
    <ol class="breadcrumb">
        @if($route != 'home')
            @foreach(\Auth::user()->group->menus as $menu)
                @if($route == $menu->name)
                    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                    <li class="active">{{ $menu->alias }}</li>
                @endif
            @endforeach
        @else
            <li class="active"><i class="fa fa-dashboard"></i> داشبورد</li>
        @endif
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @yield('content')
</section>