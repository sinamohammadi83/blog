@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="p-3 text-center text-lg-end">ویرایش اطلاعات کاربری </h3>
        <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-12 col-12 pt-5">
            <form action="{{route('client.profile.update',$user)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="border col-4 mx-auto rounded-circle col-5 col-sm-3 col-md-3">
                    <img src="{{$user->ImagePath}}" class="col-12 rounded-circle" alt="">
                </div>
                <div class="form-group mt-3">
                    <label for="">نام</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">نام خانوادگی</label>
                    <input type="text" name="family" value="{{$user->family}}" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">نام کاربری</label>
                    <input type="text" name="username" value="{{$user->username}}" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">ایمیل</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">عکس پروفایل</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">رمز عبور</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">تکرار رمز عبور</label>
                    <input type="password" name="password_confirmation" class="form-control" id="">
                </div>
                <div class="form-group text-start mt-5">
                    <input type="submit" class="color-8 border-0 px-3 py-2 rounded shadow text-white" value="بروزرسانی">
                </div>
            </form>
        </div>
    </div>

@endsection
