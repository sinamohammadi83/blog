@extends('website.layout.master')

@section('css')
    <link rel="stylesheet" href="/website/css/password.css">
@endsection

@section('content')

    <section class="section">
        <form id="form-register" enctype="multipart/form-data" class=" mx-auto col-xl-7 col-lg-7 col-md-10 col-sm-12 col-12 p-xl-5 p-2 my-5 " action="{{route('website.register.profile.store',$verifyEmail)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="text-center font-18 mt-5">برای خود یک عکس پروفایل تایین کنید.</div>
            <div class="mt-5 text-center">
                <img src="" alt="" class="col-xl-4 col-8 rounded-circle m-5 d-none" id="img">
                <div class="div-email-register">
                    <input type="file" name="image" id="inputfile" placeholder="مثال:ali@gmail.com" class="form-control">
                </div>
                @include('website.layout.errors')
                <div class="div-submit-register">
                    <input type="submit" value="تکمیل ثبت نام" class="input-submit-register">
                </div>
            </div>
        </form>
    </section>

@endsection

@section('js')
    <script src="/website/js/profile.js"></script>
@endsection
