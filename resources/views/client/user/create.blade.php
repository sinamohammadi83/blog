@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="p-3 text-center text-lg-end">ایجاد کاربر جدید</h3>
        <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-12 col-12 pt-5">
            <form action="{{route('client.user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="">نام</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">نام خانوادگی</label>
                    <input type="text" name="family" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">نام کاربری</label>
                    <input type="text" name="username" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">ایمیل</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">عکس پروفایل</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">نقش</label>
                    <select name="role" class="form-control" id="">
                        <option selected disabled>-- نقش کاربر را انتخاب کنید --</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="">رمز عبور</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">تکرار رمز عبور</label>
                    <input type="password" name="password_confirmation" class="form-control" id="">
                </div>
                <div class="form-group mt-5">
                    <div>
                        <label for="">وضعیت</label>
                    </div>
                    <label for="">غیر فعال</label>
                    <input type="checkbox" checked class="newcheckbox" name="status">
                    <label for=""> فعال</label>
                    <div class="font-13 p-2">با غیر فعال کردن این گزینه کاربر نمی تواند وارد شود</div>
                </div>
                <div class="form-group text-start mt-5">
                    <input type="submit" class="color-8 border-0 px-3 py-2 rounded shadow text-white" value="ثبت">
                </div>
            </form>
        </div>
    </div>

@endsection
