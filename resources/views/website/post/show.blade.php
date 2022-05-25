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
                    <livewire:website.post.post-like-save :post="$post"/>
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
            <livewire:website.post.comment :post="$post"/>
        </div>
        @endif
    </section>

@endsection

@section('js')
    <script src="/website/js/post.js"></script>
@endsection
