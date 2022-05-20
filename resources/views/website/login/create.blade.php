@extends('website.layout.master')

@section('css')
    <link rel="stylesheet" href="/website/css/register.css">
@endsection

@section('content')

    <section class="section">
        <form id="form-register" class=" mx-auto col-xl-7 col-lg-7 col-md-10 col-sm-12 col-12 p-xl-5 p-2 my-5 " action="{{route('website.login.store')}}" method="post">
            @csrf
            <div class="text-center">
                <div class="d-inline-block  border border-info rounded p-2"><a href="{{route('website.login.create')}}" class="text-decoration-none text-info">ورود</a></div>
                <div class="d-inline-block border border-dark rounded p-2"><a href="{{route('website.register.create')}}" class="text-decoration-none  text-dark">ثبت نام</a></div>
            </div>
            <div class="text-center font-18 mt-5">برای ورود ایمیل و رمز عبور خود را وارد نمایید</div>
            <div class="mt-5">
                <div class="me-sm-4 text-end">ایمیل<span class="color-red">*</span></div>
                <div class="div-email-register">
                    <input type="email" name="email" value="@if($cookieLogin){{$cookieLogin[0]}}@endif" placeholder="مثال:ali@gmail.com" required id="input-email-register" class="input-email-register">
                </div>
                <div class="me-sm-4 text-end">رمز عبور<span class="color-red">*</span></div>
                <div class="div-email-register">
                    <input type="password" name="password" value="@if($cookieLogin){{$cookieLogin[1]}}@endif" placeholder="مثال:12345678" required id="input-email-register" class="input-email-register">
                </div>
                <div class="text-center mt-10">
                    رمز عبور خود را فراموش کرده اید؟<a class="a-login" href="{{route('website.passwordreset.create')}}">فراموشی رمز عبور</a>
                </div>
                <div class="m-3">
                    <input type="checkbox" name="remember" @checked($cookieLogin) id="">
                    <label for="">مرا به خاطر بسپار</label>
                </div>
                @include('website.layout.errors')
                <div class="text-start mt-md-5 mb-3 col-12">
                    <input type="submit" id="button-submit" value="ورود" class="input-submit-register mt-5">
                </div>
            </div>
        </form>
    </section>

@endsection
