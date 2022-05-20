@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block text-center col-12 pt-5 pt-lg-0 posts">
        <h3 class="text-end p-2">لیست همه پست ها </h3>
        @foreach($posts as $post)
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
                <div class="text-center m-3">
                     ایجاد شده توسط:{{$post->user->username}}
                </div>
                <div class="mt-3 rounded-7 bg-info p-1">
                    <a href="{{route('client.comment.index',$post)}}" class="text-decoration-none text-dark rounded-7"><img src="/website/icon/comment.png" class="icon-comment ms-1">نظرات</a>
                </div>
                <div class="mt-3 rounded-7 bg-primary p-1">
                    <a href="{{route('website.post.show',$post)}}" class="text-decoration-none text-dark rounded-7"><img src="/website/icon/view.png" class="icon-view ms-1">مشاهده</a>
                </div>
                @can('update-post')
                    <div class="mt-3 rounded-7 color-6 p-1">
                        <a href="{{route('client.post.edit',$post)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>
                    </div>
                @endcan
                @can('delete-post')
                    <div class="mt-3 rounded-7 color-7 ">
                        <form action="{{route('client.post.destroy',$post)}}" method="post">
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
    <div class="text-center col-12 d-inline-block my-5">
        <button class="more-post btn btn-info" id="{{route('client.post.morepost')}}?page=2">پست های بیشتر</button>
    </div>

@endsection

@section('js')
    <script>
        $('.more-post').click(function (){
            $.ajax({
                url:this.id,
                method:'post',
                data:{
                    _token : '{{csrf_token()}}',
                },
                success : (res) => {
                    for (let post of res.posts.data){
                        $('.posts').append(
                            '<div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">'+
                            '<div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mx-auto my-2">'+
                                '<img src="'+post.image+'" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rounded-7" alt="'+post.title+'">'+
                            '</div>'+
                            '<div class="text-center">'+
                                'عنوان پست:'+post.title+
                            '</div>'+
                            '<div class="text-center m-3">'+
                                'دسته بندی:'+post.category+
                            '</div>'+
                            '<div class="text-center m-3">'+
                                'ایجاد شده توسط:'+post.user+
                            '</div>'+
                            '<div class="mt-3 rounded-7 bg-info p-1">'+
                                '<a href="'+post.commentlink+'" class="text-decoration-none text-dark rounded-7"><img src="/website/icon/comment.png" class="icon-comment ms-1">نظرات</a>'+
                            '</div>'+
                            '<div class="mt-3 rounded-7 bg-primary p-1">'+
                                '<a href="'+post.link+'" class="text-decoration-none text-dark rounded-7"><img src="/website/icon/view.png" class="icon-view ms-1">مشاهده</a>'+
                            '</div>'+
                            @can('update-post')
                            '<div class="mt-3 rounded-7 color-6 p-1">'+
                                '<a href="'+post.editlink+'" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>'+
                            '</div>'+
                            @endcan
                            @can('delete-post')
                            '<div class="mt-3 rounded-7 color-7 ">'+
                            '<form action="'+post.deletelink+'" method="post">'+
                                '@csrf'+
                                '@method('DELETE')'+
                                '<button class="text-decoration-none text-dark color-7 border-0 text-white py-1" type="submit">'+
                                    '<img src="/website/icon/delete.png" class="icon-delete " alt="حذف">'+
                                    'حذف'+
                                '</button>'+
                            '</form>'+
                            '</div>'+
                            @endcan
                                '</div>'
                        )
                    }
                }
            })
        })
    </script>
@endsection
