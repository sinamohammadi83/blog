@extends('website.layout.master')

@section('css')
    <link rel="stylesheet" href="/website/css/register.css">
@endsection

@section('content')

    <section class="section">
        <form id="form-register" class=" mx-auto col-xl-7 col-lg-7 col-md-10 col-sm-12 col-12 p-xl-5 p-2 my-5 " action="{{route('website.register.name.store',$verifyEmail)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="text-center font-18 mt-5">برای اکانت خود نام تایین کنید</div>
            <div class="mt-5">
                <div class="me-sm-4 text-end">نام<span class="color-red">*</span></div>
                <div class="div-email-register">
                    <input type="text" name="name" placeholder="مثال:سینا" required id="input-email-register" class="input-email-register">
                </div>
                <div class="me-sm-4 mt-2 text-end">نام خانوادگی<span class="color-red">*</span></div>
                <div class="div-email-register">
                    <input type="text" name="family" placeholder="مثال:محمدی" required id="input-email-register" class="input-email-register">
                </div>
                @include('website.layout.errors')
                <div class="text-start mt-md-5 mb-3 col-12">
                    <input type="submit" id="button-submit" value="مرحله بعد" class="input-submit-register mt-5">
                </div>
            </div>
        </form>
    </section>



@endsection

@section('js')

    <script src="/website/js/register.js"></script>

@endsection
