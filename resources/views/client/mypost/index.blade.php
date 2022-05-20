@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block text-center col-12 pt-5 pt-lg-0">
        <h3 class="text-end p-2">لیست پست های من</h3>
        @foreach($user->posts as $post)
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mx-auto my-2">
                    <img src="{{$post->ImagePath}}" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rounded-7" alt="">
                </div>
                <div class="text-center">
                    عنوان پست:{{$post->title}}
                </div>
                <div class="text-center m-3">
                    دسته بندی:{{$post->category->title}}
                </div>
                <div class="mt-3 rounded-7 bg-info p-1">
                    <a href="{{route('client.mycomment.index',$post)}}" class="text-decoration-none text-dark rounded-7"><img src="/website/icon/comment.png" class="icon-comment ms-1">نظرات</a>
                </div>
                <div class="mt-3 rounded-7 bg-primary p-1">
                    <a href="{{route('website.post.show',$post)}}" class="text-decoration-none text-dark rounded-7"><img src="/website/icon/view.png" class="icon-view ms-1">مشاهده</a>
                </div>
                @can('update-self-post')
                    <div class="mt-3 rounded-7 color-6 p-1">
                        <a href="{{route('client.myposts.edit',$post)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>
                    </div>
                @endcan
                @can('delete-self-post')
                    <div class="mt-3 rounded-7 color-7">
                        <form action="{{route('client.myposts.destroy',$post)}}" method="post">
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
