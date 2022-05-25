<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/website/css/style.css">
    <link rel="stylesheet" href="/website/css/bootstrap.min.css">
    @yield('css')
    @livewireStyles
    <title>@yield('title')وبلاگ </title>
</head>
<body dir="rtl">
<div class="loader"></div>
<div class="content">
    <header class="header col-xl-10 col-11">
        <div class="col-2 float-end menu-icon"></div>
        <div class="float-end col-xl-8 col-8 col-lg-8">
            <div id="logo" class="col-12 text-center text-xl-start col-xl-3 col-lg-3">
                <a href="{{route('website.home')}}">
                    <img src="/website/icon/logo.png" width="150px" height="100px" alt="هنرستان شهید عابدینی">
                </a>
            </div>
            <div class="div-search float-end me-lg-1 me-xl-1 col-xl-9 col-lg-9">
                <form action="{{route('website.search.index')}}" method="get" >
                    <input type="submit" value="" class="input-submit float-start">
                    <input type="text" name="q" value="{{request('q')}}" class="input-search col-xl-10 float-start col-lg-10" placeholder="جستجو...">
                </form>
            </div>
        </div>

        <div class="float-start col-xl-4 text-center col-2 col-lg-4 mt-4-2 ps-0 ps-lg-3">
            @auth
                <div class="float-start col-xl-4 text-center col-2 col-lg-4 ps-3">
                    <a class="account float-start" style="cursor: pointer;"><img src="/website/icon/account.png" class="icon-login" alt="کاربری حساب"></a>
                </div>
            @else
                <div class="mt-3 mt-lg-2 ps-2 p-lg-0 m-2">
                    <a href="{{route('website.register.create')}}" class="register inline-block hidden float-start"><img src="/website/icon/register.png" class="icon-register" alt="ثبت نام"><span class="inline-block">ثبت نام</span></a>
                    <a href="{{route('website.login.create')}}" class="login float-start"><img src="/website/icon/login.png" class="icon-login" alt="ورود"><span class="inline-block d-none d-md-inline-block">ورود</span></a>
                </div>
            @endauth
        </div>
        <div class="bg-white float-start position-absolute text-center rounded dropdown-account p-2 pb-0 border border-dark" style="display: none;">
            @can('view-client-dashboard')
                <div class="border-dark border-bottom p-2"><a href="{{route('client.home')}}" class="text-dark text-decoration-none">پنل کاربری</a></div>
            @endcan
            <div class="border-dark pt-1 mt-2 bg-danger mb-2 rounded text-white font-13">
                <form action="{{route('website.logout')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-danger border-0 p-2 rounded text-white">خروج از حساب کاربری</button>
                </form>
            </div>
        </div>
    </header>
    <div class="nav col-xl-10 col-lg-11">
        <div class="ml-10" id="category"><a href="#">دسته بندی ها<img id="icon-dropdown" class="icon-dropdown" src="/website/icon/icon_sort_down.png"/></a></div>
        <div><a href="{{route('website.contact.create')}}" >تماس با ما</a></div>
        <div><a href="{{route('website.aboutus.show')}}" >درباره ما</a></div>
    </div>

    @include('website.layout.categories')

    <div class="background-menu hidden" style="background-color: rgba(0, 0, 0, 0.514);height: 100%;width: 100%;position: fixed;z-index: 1;top: 0;">
        <div class="float-start m-3 close-menu"><img src="/website/icon/close.png" alt="بستن"></div>
        <div class="bg-light menu h-100 overflow-scroll" style="z-index: 2;color: black;width: 0px;">
            <div class="text-center">
                <a href="{{route('website.home')}}">
                    <img src="/website/icon/logo.png" class="col-8" height="120px" alt="هنرستان شهید عابدینی">
                </a>
            </div>
            <div class="col-12 p-2">
                <form action="{{route('website.search.index')}}" method="get">
                    <input type="text" class="col-8 float-end input-search" value="{{request('q')}}" name="q">
                    <input type="submit" class="float-end input-submit" value="">
                </form>
            </div>
            @include('website.layout.category_mobile')
            <div class="d-inline-block p-3 col-12">
                <a href="{{route('website.contact.create')}}" class="text-decoration-none text-dark">تماس با ما</a>
            </div>
            <div class="d-inline-block p-3 col-12 ">
                <a href="{{route('website.aboutus.show')}}" class="text-decoration-none text-dark">درباره ما</a>
            </div>
        </div>
    </div>

    @yield('content')

    <hr class="mx-auto col-10">
    <footer>
        <div class="col-xl-12">
            <div class="fast-ability float-md-end col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 text-center">
                <h3>دسترسی سریع</h3>
                <div class="fast-ability-items"><a href="{{route('website.contact.create')}}">تماس با ما</a></div>
                <div class="fast-ability-items"><a href="{{route('website.aboutus.show')}}">درباره ما</a></div>
                <div class="fast-ability-items"><a href="{{route('website.login.create')}}">ورود</a></div>
                <div class="fast-ability-items"><a href="{{route('website.register.create')}}">عضویت</a></div>
            </div>
            <livewire:website.newsletter/>
            <div class="rules col-12 mt-3 d-inline-block p-3">تمامی حقوق این وب سایت متعلق به هنرستان شهید عابدینی می باشد و هرگونه کپی برداری از سایت با ذکر منبع بلامانع است و در غیر این صورت پیگرد قانونی دارد.</div>
        </div>
    </footer>
</div>
<script src="/website/js/jquery-3.6.0.min.js"></script>
<script src="/website/js/js.js"></script>
<script>
    $(document).ready(function (){
        $('.loader').fadeOut(300)
        $('.content').fadeIn(300)
    });
</script>
@yield('js')
@livewireScripts
</body>
</html>
