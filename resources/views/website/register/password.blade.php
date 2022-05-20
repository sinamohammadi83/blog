@extends('website.layout.master')

@section('css')
    <link rel="stylesheet" href="/website/css/password.css">
@endsection

@section('content')

    <section class="section">
        <form id="form-register" action="{{route('website.register.password.store',$verifyEmail)}}" class=" mx-auto col-xl-7 col-lg-7 col-md-10 col-sm-12 col-12 p-xl-5 p-2 my-5 " method="post">
            @csrf
            @method('PATCH')
            <div class="text-center mt-5"><img src="/website/icon/password.png" class="icon-password">برای حساب کاربری خود رمز ورود تعیین کنید</div>
            <div class="mt-5">
                <div class="label-password">رمز عبور<span class="color-red">*</span></div>
                <div class="div-password-register">
                    <input type="password" name="password" placeholder="مثال:123456789" required id="input-password-register" class="input-password-register">
                </div>
                <div class="label-password">تکرار رمز عبور<span class="color-red">*</span></div>
                <div class="div-password-register">
                    <input type="password" name="password_confirmation" placeholder="مثال:123456789" required id="input-repassword-register" class="input-password-register">
                </div>
                @include('website.layout.errors')
                <div class="div-submit-register">
                    <input type="submit" value="مرحله بعد" class="input-submit-register">
                </div>
            </div>
        </form>
    </section>

@endsection
