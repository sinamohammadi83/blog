<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/client/css/bootstrap.min.css">
    <link rel="stylesheet" href="/client/css/panel.css">
    @yield('css')
    <title>پنل کاربری</title>
</head>
<body dir="rtl">
<div class="loader"></div>
<div class="content">
    <section>
        @include('client.layout.panel_mobile')
        <div class="d-xl-flex d-lg-flex mx-auto col-xl-9 col-lg-9 col-md-9 col-sm-9 my-sm-5 col-11 my-3 my-xl-5 my-md-5 py-1 my-lg-5 rounded-3 color-1" >
            @include('client.layout.panel')
            <div class="panel_left col-xl-8 col-lg-8 col-md-12 col-sm-12 color-3 m-2 mt-0 me-0 m-lg-2 p-4 rounded-3 @if(\Illuminate\Support\Facades\Route::currentRouteName()!='client.home') h-auto @endif h-lg-auto p-lg-2" @if($minipanel) style="width: 92%;" @endif>
                <div class=" d-lg-none">
                    <img src="/website/icon/icon_menu.png" alt="" class="icon-menu">
                </div>
                @yield('content')
                @include('client.layout.errors')
            </div>
        </div>
    </section>
</div>
<script src="/website/js/jquery-3.6.0.min.js"></script>
<script>
    $('.icon_menu_panel').click(function (){
        if ($(this).hasClass('active')){
            $.ajax({
                method:'post',
                url:'{{route('client.menu')}}',
                data : {
                    is_active : 'false',
                    _token : '{{csrf_token()}}'
                }
            })
        }else {
            $.ajax({
                method:'post',
                url:'{{route('client.menu')}}',
                data : {
                    is_active : 'true',
                    _token : '{{csrf_token()}}'
                }
            })
        }

    })
</script>
<script>
    $(document).ready(function (){
        $('.loader').fadeOut(300)
        $('.content').fadeIn(300)
    });
</script>
<script src="/website/js/panel.js"></script>
@yield('js')
</body>
</html>
