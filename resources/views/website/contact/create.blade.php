@extends('website.layout.master')

@section('css')
    <link rel="stylesheet" href="/website/css/contact.css">
    <link rel="stylesheet" href="/website/css/register.css">
@endsection

@section('content')

    <section class="section my-5">
        <div class="shadow-lg rounded mx-auto p-4 col-12 col-xl-12 col-lg-5 col-md-7 col-sm-10 d-xl-flex">
            <div class="col-xl-6 col-12">
                <div class="p-4 col-xl-12 text-center">با تکمیل فرم زیر می‌توانید با ما در ارتباط باشید.</div>
                <form action="{{route('website.contact.store')}}" class="col-12" method="post">
                    @csrf
                    <div class="form-group text-end">
                        <label for="">نام<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="">
                    </div>
                    <div class="form-group text-end mt-3">
                        <label for="">ایمیل<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="">
                    </div>
                    <div class="form-group text-end mt-3">
                        <label for="">موضوع<span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control" id="">
                    </div>
                    <div class="form-group text-end mt-3">
                        <label for="">توضیحات<span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <input type="submit" value="ثبت" class=" mt-4 color-1 col-12">
                </form>
                @include('website.layout.errors')
            </div>
            <div class="col-xl-6  mt-lg-5 text-break">
                <div class="font-25 text-center">اطلاعات تماس</div>
                <hr class="col-11 mx-auto ">
                <div class="p-4 col-xl-12 text-center">میتوانید از طریق یکی از راه های ارتباطی زیر با ما در تماس باشید.</div>
                <div class="col-12 text-center mt-5">شماره تماس:07132227686 – 07132240081 – 07132241714</div>
                <div class="col-12 text-center mt-5">ایمیل:abedini14010@gmail.com</div>
            </div>
        </div>
    </section>

@endsection
