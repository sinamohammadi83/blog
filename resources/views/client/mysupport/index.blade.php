@extends('client.layout.master')



@section('content')

<div class="row">
    <h4 class="p-2 ">لیست درخواست های پشتیبانی من</h4>

    @can('create-support')
        <div>
            <a href="{{route('client.mysupport.create')}}" class="btn btn-success float-start">ایجاد درخواست</a>
        </div>
    @endcan

    @foreach($user->startsupports as $support)
        <div class="shadow-lg rounded-7 col-12 col-xl-5 col-lg-8 col-md-9 col-sm-10 mx-auto my-5">
            <div class="p-3">کد پشتیبانی : <a href="" class="text-decoration-none text-info">{{$support->unique_code}}</a></div>
            <div class="p-3 ">عنوان : {{$support->title}}</div>
            <div class="p-3">تاریخ ثبت : {{$support->created_at}}</div>
            <div class="p-3">پاسخ : {{$user->count_awnser($support->unique_code)}}</div>
            <a href="{{route('client.mysupport.show',$support->support)}}" class="btn btn-info btn-sm col-12 my-3 rounded-7">مشاهده</a>
        </div>
    @endforeach

</div>

@endsection
