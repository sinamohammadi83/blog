@extends('website.layout.master')


@section('content')

    <section class="section">
        <h2 class="new-post col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 text-center mx-auto shadow-lg rounded-3 p-xl-2 p-2 mt-3">نتیجه جستجو برای : {{$q}}</h2>
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
        </div>
    </section>

@endsection

@section('js')
    <script>
        $('.heart').click(function (){
            $.ajax({
                method: 'post',
                url:'http://{{request()->server('HTTP_HOST')}}/post/'+this.id+'/like',
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
                url:'http://{{request()->server('HTTP_HOST')}}/post/'+this.id+'/save',
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
    </script>
@endsection
