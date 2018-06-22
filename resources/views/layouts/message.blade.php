{{-- Show Error --}}
@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" style="margin: 15px 15px 5px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon fa fa-ban"></i>خطا !</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Show Warning --}}
@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible" style="margin: 15px 15px 5px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon fa fa-warning"></i>هشدار !</h4>
        <ul>
            @foreach(session()->get('warning') as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Show Success --}}
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" style="margin: 15px 15px 5px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon fa fa-check"></i>کامیابی !</h4>
        <ul>
            @foreach(session()->get('success') as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Show Information --}}
@if(session()->has('information'))
    <div class="alert alert-info alert-dismissible" style="margin: 15px 15px 5px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon fa fa-info"></i>اطلاعات !</h4>
        <ul>
            @foreach(session()->get('information') as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif
