@extends('website.layout.master')

@section('css')
    <link rel="stylesheet" href="/website/css/register.css">
@endsection

@section('content')
<section class="section">
    <form id="form-register" class=" mx-auto col-xl-7 col-lg-7 col-md-10 col-sm-12 col-12 p-xl-5 p-2 my-5 " action="{{route('website.register.store')}}" method="post">
        @csrf
        <div class="text-center">
            <div class="d-inline-block  border border-dark rounded p-2"><a href="{{route('website.login.create')}}" class="text-decoration-none text-dark">ورود</a></div>
            <div class="d-inline-block border border-info rounded p-2"><a href="{{route('website.register.create')}}" class="text-decoration-none text-info">ثبت نام</a></div>
        </div>
        <div class="text-center font-18 mt-5">برای ثبت نام لطفا ایمیل خود را وارد نمایید</div>
        <div class="mt-5">
            <div class="me-sm-4 text-end">ایمیل<span class="color-red">*</span></div>
            <div class="div-email-register">
                <input type="email" name="email" placeholder="مثال:ali@gmail.com" id="input-email-register" class="input-email-register">
            </div>
            <div class="text-center mt-10">
                قبلا ثبت نام کرده اید؟<a class="a-login" href="{{route('website.login.create')}}">وارد شوید</a>
            </div>
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
            @include('website.layout.errors')
            <div class="text-start mt-md-5 mb-3 col-12">
                <input type="submit" id="button-submit" value="مرحله بعد" class="input-submit-register mt-5">
            </div>
        </div>
    </form>
</section>
@endsection

@section('js')
    {!! NoCaptcha::renderJs() !!}
@endsection
