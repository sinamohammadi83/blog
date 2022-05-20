@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block text-center col-12 pt-5 pt-lg-0">
        @foreach($user->saves as $post)
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mx-auto my-2">
                    <img src="{{$post->ImagePath}}" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rounded-7" alt="">
                </div>
                <div class="text-center">
                    عنوان پست:{{$post->title}}
                </div>
                <div class="mt-3 rounded-7 color-6 p-1">
                    <a href="{{route('website.post.show',$post)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">مشاهده</a>
                </div>
                <div class="mt-3 rounded-7 color-7 ">
                    <form action="{{route('client.save.destroy',$post)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" type="submit">
                            <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                            حذف
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
