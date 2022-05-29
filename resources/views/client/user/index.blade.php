@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block text-center pt-5 col-12 pt-lg-0">
        <h3 class="text-end p-2">لیست کاربران</h3>
        @foreach($users as $user)
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">
            <div class="bg-white p-3 rounded-7">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mx-auto my-2">
                    <img src="{{$user->ImagePath}}" class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 rounded-circle " alt="">
                </div>
                <div>
                    <div>نام و نام خانوادگی:
                        <div>
                            {{$user->name}} {{$user->family}}
                        </div>
                    </div>
                    <hr>
                    <div>ایمیل:
                        <div>
                            {{$user->email}}
                        </div>
                    </div>
                    <hr>
                    <div>نام کاربری:
                        <div>
                            {{$user->username}}
                        </div>
                    </div>
                    <hr>
                    <div>نقش:{{$user->role->title}}</div>
                </div>
                @can('update-user')
                    <div class="mt-3 rounded-7 color-6 p-1">
                        <a href="{{route('client.user.edit',$user)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>
                    </div>
                @endcan
                @can('delete-user')
                    <div class="mt-3 rounded-7 color-7 ">
                        <form action="{{route('client.user.destroy',$user)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" type="submit">
                                <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                                حذف
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
        @endforeach

    </div>

@endsection
