@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
    <link rel="stylesheet" href="/client/css/comment.css">
@endsection

@section('content')

    <div class="d-inline-block text-center col-12 pt-5 pt-lg-0">
        <h3 class="text-end p-3 ">نظرات پست {{$post->title}}</h3>
        @foreach($post->oncomment() as $comment)
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 m-2 float-start color-5 rounded-7 shadow-sm p-3" id="comment-{{$comment->id}}">
                <div class="d-lg-flex">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 my-2">
                        <img src="{{$comment->user->ImagePath}}" class="col-xl-8 col-lg-12 col-md-3 col-sm-4 col-5 rounded-circle" alt="">
                    </div>
                    <div class="text-center m-3">
                        نام و نام خانوادگی:{{$comment->user->name}} {{$comment->user->family}}
                        <div class="text-center mt-3">
                            نام کاربری:{{$comment->user->username}}
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded text-end p-2">
                    {{$comment->content}}
                </div>
                <button class="color-6 col-2 rounded mt-2 justify-content-center p-2 d-flex reply border-0" data-comment-id="{{$comment->id}}">
                    پاسخ
                    <img src="/website/icon/icon_sort_down.png" width="15px" class="h-50 mt-1" alt="">
                </button>
                <div class="col-12 bg-white mt-3 p-3 rounded" style="display: none" id="reply-{{$comment->id}}">
                    <p class="text-end">پاسخ</p>
                    <form action="{{route('client.comment.reply',['post' => $post,'comment' => $comment])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="ثبت" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <div class="mt-3 rounded-7 color-7 ">
                    <form action="{{route('client.comment.destroy',['post' => $post ,'comment' => $comment])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" type="submit">
                            <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                            حذف
                        </button>
                    </form>
                </div>
            </div>
            @foreach($comment->comments as $parentcomment)
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 m-2 float-start color-9 rounded-7 shadow-sm p-3" id="comment-{{$parentcomment->id}}">
                    <div class="d-lg-flex">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 my-2">
                            <img src="{{$parentcomment->user->ImagePath}}" class="col-xl-8 col-lg-12 col-md-3 col-sm-4 col-5 rounded-circle" alt="">
                        </div>
                        <div class="text-center m-3">
                            نام و نام خانوادگی:{{$parentcomment->user->name}} {{$parentcomment->user->family}}
                            <div class="text-center mt-3">
                                نام کاربری:{{$parentcomment->user->username}}
                            </div>
                            <div class="text-center mt-3">
                                در جواب به <a class="text-decoration-none text-white" href="#comment-{{$parentcomment->comment->id}}">{{$parentcomment->user->name}} {{$parentcomment->user->family}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded text-end p-2">
                        {{$parentcomment->content}}
                    </div>
                    <button class="color-6 col-2 rounded mt-2 justify-content-center p-2 d-flex reply border-0" data-comment-id="{{$parentcomment->id}}">
                        پاسخ
                        <img src="/website/icon/icon_sort_down.png" width="15px" class="h-50 mt-1" alt="">
                    </button>
                    <div class="col-12 bg-white mt-3 p-3 rounded" style="display: none" id="reply-{{$parentcomment->id}}">
                        <p class="text-end">پاسخ</p>
                        <form action="{{route('client.comment.reply',['post' => $post,'comment' => $parentcomment])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="ثبت" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                    <div class="mt-3 rounded-7 color-7 ">
                        <form action="{{route('client.comment.destroy',['post' => $post ,'comment' => $parentcomment])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" type="submit">
                                <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
                @foreach($parentcomment->comments as $childcomment)
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 m-2 float-start color-8 rounded-7 shadow-sm p-3" id="comment-{{$childcomment->id}}">
                        <div class="d-lg-flex">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 my-2">
                                <img src="{{$childcomment->user->ImagePath}}" class="col-xl-8 col-lg-12 col-md-3 col-sm-4 col-5 rounded-circle" alt="">
                            </div>
                            <div class="text-center m-3">
                                نام و نام خانوادگی:{{$childcomment->user->name}} {{$childcomment->user->family}}
                                <div class="text-center mt-3">
                                    نام کاربری:{{$childcomment->user->username}}
                                </div>
                                <div class="text-center mt-3">
                                    در جواب به <a class="text-decoration-none text-white" href="#comment-{{$childcomment->comment->id}}">{{$childcomment->user->name}} {{$childcomment->user->family}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded text-end p-2">
                            {{$childcomment->content}}
                        </div>
                        <div class="mt-3 rounded-7 color-7 ">
                            <form action="{{route('client.comment.destroy',['post' => $post ,'comment' => $childcomment])}}" method="post">
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
            @endforeach
        @endforeach
    </div>

@endsection

@section('js')
    <script src="/client/js/comment.js"></script>
@endsection

