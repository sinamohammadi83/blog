@extends('website.layout.master')

@section('title')
    | {{$post->title}}
@endsection

@section('css')
    <link rel="stylesheet" href="/website/css/post.css">
@endsection

@section('content')

    <section class="section ">
        <div class="mx-auto col-10 mb-3">
            @if($post->category->category)
                @if($post->category->category->category)
                    <a href="{{route('website.category.show',$post->category->category->category)}}" class="text-secondary text-decoration-none ">
                        {{$post->category->category->category->title}}
                    </a>>
                @endif
            @endif
            @if($post->category->category)
                <a href="{{route('website.category.show',$post->category->category)}}" class="text-secondary text-decoration-none">
                    {{$post->category->category->title}}
                </a>>
            @endif
            <a href="{{route('website.category.show',$post->category)}}" class="text-secondary text-decoration-none">
                {{$post->category->title}}
            </a>
        </div>
        <div class="post col-11 col-xl-10">
            <h1 class="post-title text-center text-xl-end text-lg-end ">{{$post->title}}</h1>
            <div class="text-center text-lg-end">
                <img src="{{$post->ImagePath}}" alt="" class="rounded-3 col-12 col-xl-5 col-lg-5 col-md-8 col-sm-8 ">
            </div>
            <div class="mt-3">
                @php
                    echo $post->content
                @endphp
            </div>
            <div class="d-md-flex col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 pe-xl-5 mt-5">
                @auth
                    <div class="text-center col-xl-4 col-lg-3 col-md-3 col-12 col-sm-12">
                        <div class="post-saved @if($post->hasSave()) save @endif mt-2"></div>
                        <span id="count-like">{{$post->like->count()}}</span><div class="post-heart @if($post->hasLike()) like @endif" id="post-{{$post->slug}}"></div>
                    </div>
                @endauth

                <div class=" col-xl-4 col-lg-4 font-13 col-md-4 col-sm-12 col-12 p-2 text-center">
                    تاریخ انتشار:{{$post->created_at}}
                </div>

                <div class=" col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 p-2 text-center">
                    نویسنده:{{$post->user->username}}
                </div>
            </div>
        </div>
        @if($post->comment)
        <div class="mx-auto col-xl-11 m-5 text-end p-2">
            <div class="font-25">نظرات</div>
            @auth
            <div class="fw-bolder">درباره این پست نظر خود را بنویسید.</div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-10 mx-auto">
                <form action="{{route('website.comment.store',$post)}}" method="post" class="my-3">
                    @csrf
                    <div class="form-group">
                        <label for="">متن نظر<span class="text-danger">*</span></label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="rounded border-0 shadow-lg mt-2 submit-comment col-xl-1 col-lg-1 col-md-2 col-sm-2 col-3" value="ثبت">
                    </div>
                </form>
            </div>
            @else
                <div class="alert alert-warning col-8 mx-auto">برای نظر دادن <a class="text-warning text-decoration-none" href="{{route('website.login.create')}}">وارد شوید.</a></div>
            @endauth
        </div>
            <div class="mx-auto col-xl-11">
            {{$post->comments->count()}} دیدگاه
            <hr class="mx-auto col-xl-12">

            <div class="pe-xl-5 pe-lg-5">
                @foreach($post->oncomment() as $comment)
                    <div class="shadow-lg mx-auto mx-lg-0 p-3 col-xl-8 col-lg-8 col-md-10 col-sm-10 col-11 ms-md-5 rounded-3 mt-5" id="comment-{{$comment->id}}">
                    <div class="float-end col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 text-end text-lg-center">
                        <img src="{{$comment->user->ImagePath}}" class="img-thumbnail col-xl-8 col-10 col-lg-8 col-md-8 col-sm-11 mt-2 rounded" alt="{{$comment->user->name}} {{$comment->user->family}}">
                    </div>
                    <div class="mt-4 pt-1 pb-2 text-end">{{$comment->user->name}} {{$comment->user->family}}</div>
                    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mt-4 p-2">
                            {{$comment->content}}
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center p-xl-3">
                        <div class="cursor-pointer mt-3 reply" id="icon-reply-{{$comment->id}}">
                            <img src="/website/icon/reply.png" class="icon-reply" alt="">پاسخ
                        </div>
                        <div class="cursor-pointer mt-3 d-none reply" id="icon-close-reply-{{$comment->id}}">
                            <img src="/website/icon/icon_close.png" class="icon-reply" alt="">بستن
                        </div>
                    </div>
                    <div class="reply-form col-xl-8 " style="display: none;" id="reply-{{$comment->id}}">
                        @auth
                        <form action="{{route('website.comment.awnser',['post' => $post , 'comment' => $comment])}}" method="post" class="my-3 p-2">
                            @csrf
                            <div class="form-group">
                                <label for="">متن نظر<span class="text-danger">*</span></label>
                                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="rounded border-0 shadow-lg mt-2 submit-comment col-xl-1 col-lg-1 col-md-2 col-sm-2 col-3" value="ثبت">
                            </div>
                        </form>
                        @else
                            <div class="alert alert-warning col-8 mx-auto">برای نظر دادن <a class="text-warning text-decoration-none" href="{{route('website.login.create')}}">وارد شوید.</a></div>
                        @endauth
                    </div>
                </div>
                    @foreach($comment->comments as $parentcomment)
                        <div class="shadow-lg col-xl-8 p-3 col-10 col-lg-8 col-md-9 col-sm-9 ms-sm-5 ms-3 mx-auto ms-0 ms-md-5 me-lg-5 me-xl-5 rounded-3 mx-lg-0 mt-5 " style="background-color: #81ecec;" id="comment-{{$parentcomment->id}}">
                            <div class="float-end col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 text-end text-lg-center">
                                <img src="{{$parentcomment->user->ImagePath}}" class="img-thumbnail col-xl-8 col-10 col-lg-8 col-md-8 col-sm-11 mt-2 rounded" alt="سینا محمدی">
                            </div>
                            <div class="mt-4 pt-1 pb-2 text-end"><a href="../user.html" class="text-decoration-none text-dark">{{$parentcomment->user->name}} {{$parentcomment->user->family}}</a></div>
                            <div class="text-end">در جواب به <a href="#comment-{{$parentcomment->comment->id}}" class="text-decoration-none ">{{$parentcomment->comment->user->name}} {{$parentcomment->comment->user->family}}</a></div>
                            <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="mt-4 p-2">
                                    {{$parentcomment->content}}
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center p-xl-3">
                                <div class="cursor-pointer mt-3 reply" id="icon-reply-{{$parentcomment->id}}">
                                    <img src="/website/icon/reply.png" class="icon-reply" alt="">پاسخ
                                </div>
                                <div class="cursor-pointer mt-3 d-none reply" id="icon-close-reply-{{$parentcomment->id}}">
                                    <img src="/website/icon/icon_close.png" class="icon-reply" alt="">بستن
                                </div>
                            </div>
                            <div class="reply-form col-xl-8 " style="display: none;" id="reply-{{$parentcomment->id}}">
                                @auth
                                <form action="{{route('website.comment.awnser',['post' => $post , 'comment' => $parentcomment])}}" method="post" class="my-3 p-2">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">متن نظر<span class="text-danger">*</span></label>
                                        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="rounded border-0 shadow-lg mt-2 submit-comment col-xl-1 col-lg-1 col-md-2 col-sm-2 col-3" value="ثبت">
                                    </div>
                                </form>
                                @else
                                    <div class="alert alert-warning col-8 mx-auto">برای نظر دادن <a class="text-warning text-decoration-none" href="{{route('website.login.create')}}">وارد شوید.</a></div>
                                @endauth
                            </div>
                        </div>
                        @foreach($parentcomment->comments as $childcomment)
                            <div class="me-3 me-md-5">
                                <div class="shadow-lg col-xl-8 p-3 col-lg-8 col-md-8 col-sm-8 col-10 rounded-3 mt-5 mx-auto mx-lg-0 me-lg-5  me-xl-5 ms-sm-5 ms-2" style="background-color: #3498db;" id="comment-2">
                                    <div class="float-end col-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 text-end text-lg-center">
                                        <img src="{{$childcomment->user->ImagePath}}" class="img-thumbnail col-xl-8 col-10 col-lg-8 col-md-8 col-sm-11 mt-2 rounded" alt="{{$childcomment->user->name}} {{$childcomment->user->family}}">
                                    </div>
                                    <div class="mt-4 pt-1 pb-2 text-end"><a href="../user.html" class="text-decoration-none text-dark">{{$childcomment->user->name}} {{$childcomment->user->family}}</a></div>
                                    <div class="text-end">در جواب به <a href="#comment-{{$childcomment->comment->id}}" class="text-decoration-none text-white">{{$childcomment->comment->user->name}} {{$childcomment->comment->user->family}}</a></div>
                                    <div class="d-inline-block col-xl-10 col-lg-12 col-12">
                                        <div class="mt-4 p-2">
                                            {{$childcomment->content}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
        @endif
    </section>

@endsection

@section('js')
    <script src="/website/js/post.js"></script>

    <script>
        $('.post-saved').click(function (){
            $.ajax({
                method: 'post',
                url:'{{route('website.save.store')}}?post={{$post->slug}}',
                data:{
                    _token : '{{csrf_token()}}'
                },
                success : () => {
                    if($(this).hasClass('save')) {
                        $(this).removeClass('save')
                    }else {
                        $(this).addClass('save')
                    }
                }
            })
        })
        $('.post-heart').click(function (){
            $.ajax({
                method: 'post',
                url:'{{route('website.like.store')}}?post={{$post->slug}}',
                data:{
                    _token : '{{csrf_token()}}'
                },
                success : (res) => {
                    if($(this).hasClass('like')) {
                        $(this).removeClass('like')
                    }else {
                        $(this).addClass('like')
                    }
                    $('#count-like').text(res.data.likes.count)
                }
            })
        })
    </script>
@endsection
