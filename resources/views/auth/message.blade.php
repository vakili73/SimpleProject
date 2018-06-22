{{-- Show Errors --}}
@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4>خطا !</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- Show Information --}}
@if(\Session::has('login_information'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4>اطلاعات !</h4>
        <ul>
            @foreach(\Session::get('login_information') as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif