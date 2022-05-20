@extends('website.layout.master')


@section('content')

    <section class="section">
        <h2 class="new-post col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 text-center mx-auto shadow-lg rounded-3 p-xl-2 p-2 mt-3">دسته بندی : {{$category->title}}</h2>
        <div class="newposts">
            @foreach($posts as $post)
                <div class="cart col-12 col-xl-4 col-lg-6 col-md-6 col-sm-9">
                    <a href="{{route('website.post.show',$post)}}">
                        <img src="{{str_replace('public','/storage',$post->image)}}" class="image-cart" alt="{{$post->title}}">
                    </a>
                    <a href="{{route('website.post.show',$post)}}" class="color-black-hover">
                        <p class="title-cart">{{$post->title}}</p>
                    </a>
                    @auth
                        <div class="mx-lg-auto col-xl-7 mt-xl-5">
                            <div class="saved @if($post->hasSave()) save @endif col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block" id="{{$post->slug}}"></div>
                            <div class="heart @if($post->hasLike()) like @endif col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " id="{{$post->slug}}"></div>
                        </div>
                    @endauth
                </div>
            @endforeach
                @if ($posts->hasPages())
                    <div class="mt-4 p-4 box has-text-centered">
                        {{ $posts->links() }}
                    </div>
                @endif
        </div>
    </section>

@endsection

@section('js')
    <script>
        $('.btn-newpost').click(function (){
            let btn_id = this.id
            $.ajax({
                method:'post',
                url:btn_id,
                data:{
                    _token:'{{csrf_token()}}',
                },
                success : (res) => {
                    if (res.posts.links.next!=this.id) {
                        this.id = res.posts.links.next
                    }else {
                        this.id = 'null'
                    }
                    for (let post of res.posts.data)
                    {
                        $('.newposts').append(
                            '<div class="cart col-12 col-xl-4 col-lg-6 col-md-6 col-sm-9">'+
                            '<a href="'+post.link+'">'+
                            '<img src="'+post.image+'" class="image-cart" alt="'+post.title+'">'+
                            '</a>'+
                            '<a href="'+post.link+'" class="color-black-hover">'+
                            '<p class="title-cart">'+post.title+'</p>'+
                            '</a>'+
                            '<p class="description-cart">'+post.content+'</p>'+
                            '<div class="mx-lg-auto col-xl-7 mt-xl-5 py-1">'+
                            '<div class="saved col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block" id="'+post.id+'"></div>'+
                            '<div class="heart col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " id="'+post.id+'"></div>'+
                            '</div>'+
                            '</div>'
                        )
                    }
                }
            })
        })

        $('.btn-popularpost').click(function (){
            let btn_id = this.id
            $.ajax({
                method:'post',
                url:btn_id,
                data:{
                    _token:'{{csrf_token()}}'
                },
                success : (res) => {

                    if (res.posts.links.next!=this.id) {
                        this.id = res.posts.links.next
                    }else {
                        this.id = 'null'
                    }
                    for (let post of res.posts.data)
                    {
                        $('.popularposts').append(
                            '<div class="cart col-12 col-xl-4 col-lg-6 col-md-6 col-sm-9">'+
                            '<a href="'+post.link+'">'+
                            '<img src="'+post.image+'" class="image-cart" alt="'+post.title+'">'+
                            '</a>'+
                            '<a href="'+post.link+'" class="color-black-hover">'+
                            '<p class="title-cart">'+post.title+'</p>'+
                            '</a>'+
                            '<p class="description-cart">'+post.content+'</p>'+
                            '<div class="mx-lg-auto col-xl-7 mt-xl-5 py-1">'+
                            '<div class="saved col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block" id="'+post.id+'"></div>'+
                            '<div class="heart col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " id="'+post.id+'"></div>'+
                            '</div>'+
                            '</div>'
                        )
                    }
                }
            })
        })
        @auth
        $('.heart').click(function (){
            $.ajax({
                method: 'post',
                url:'{{route('website.like.store')}}?post='+this.id,
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

        $('.saved').click(function (){
            $.ajax({
                method: 'post',
                url:'{{route('website.save.store')}}?post='+this.id,
                data:{
                    _token : '{{csrf_token()}}'
                },
                success : (res) => {
                    if($(this).hasClass('save')) {
                        $(this).removeClass('save')
                    }else {
                        $(this).addClass('save')
                    }
                    $('#count-like').text(res.data.likes.count)
                }
            })
        })
        @endauth
    </script>
@endsection
