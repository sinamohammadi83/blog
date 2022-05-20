@extends('client.layout.master')

@section('css')

    <link rel="stylesheet" href="/client/css/post.css">

@endsection

@section('content')

    <div class="text-center pt-5 pt-lg-0 ">
        <h3 class="text-end p-2">لیست نقش ها</h3>
        @foreach($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-11 col-11 m-2 float-md-start color-5 rounded-7 p-3">
                <div class="text-center">
                    عنوان نقش:{{$role->title}}
                </div>
                @can('update-role')
                    <div class="mt-3 rounded-7 color-6 p-1">
                        <a href="{{route('client.role.edit',$role)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>
                    </div>
                @endcan
                @can('delete-role')
                    <div class="mt-3 rounded-7 color-7">
                        <form action="{{route('client.role.destroy',$role)}}" method="post">
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
        @endforeach
    </div>

@endsection
