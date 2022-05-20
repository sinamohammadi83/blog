@extends('website.layout.master')


@section('content')

    <section class="section">
    <h2 class="new-post col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 text-center mx-auto shadow-lg rounded-3 p-xl-2 p-2 mt-3">پست های جدید</h2>
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
                        <div class="heart @if($post->hasLike()) like @endif col-2 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " id="{{$post->slug}}"></div>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>
        <div class="text-center">
            <button class="btn btn-info btn-newpost" id="{{route('website.newpost')}}?page=2">نمایش بیشتر پست های جدید</button>
        </div>
    <h2 class="new-post col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 text-center mx-auto shadow-lg rounded-3 p-xl-2 p-2 mt-3">پست های محبوب</h2>
    <div class="popularposts">
        @foreach($popularPost as $post)
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
                        <div class="heart @if($post->hasLike()) like @endif col-2 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " id="{{$post->slug}}"></div>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>
        <div class="text-center">
            <button class="btn btn-info btn-popularpost" id="{{route('website.popularpost')}}?page=2">نمایش بیشتر پست های محبوب</button>
        </div>
</section>

@endsection

@section('js')
    <script>
        function like(like)
        {
            let id = like.id.split('_')[1]
            $.ajax({
                method: 'post',
                url:'{{route('website.like.store')}}?post='+id,
                data:{
                    _token : '{{csrf_token()}}'
                },
                success : (res) => {
                    if($('#'+like.id).hasClass('like')) {
                        $('#'+like.id).removeClass('like')
                    }else {
                        $('#'+like.id).addClass('like')
                    }
                    $('#count-like').text(res.data.likes.count)
                }
            })
        }

        function save(save)
        {
            let id = save.id.split('_')[1]
            $.ajax({
                method: 'post',
                url:'{{route('website.save.store')}}?post='+id,
                data:{
                    _token : '{{csrf_token()}}'
                },
                success : () => {
                    if($('#'+save.id).hasClass('save')) {
                        $('#'+save.id).removeClass('save')
                    }else {
                        $('#'+save.id).addClass('save')
                    }
                }
            })
        }

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
                        let hasLike = ''
                        if(post.is_Liked)
                        {
                           hasLike = 'like'
                        }
                        let hasSave = ''
                        if(post.is_Saved)
                        {
                            hasSave = 'save'
                        }
                        let like = '<div class="mx-lg-auto col-xl-7 mt-xl-5 py-1">'+
                            '<div class="saved '+hasSave+' col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block" onclick="save(this)" id="save_'+post.id+'"></div>'+
                            '<div class="heart '+hasLike+' col-2 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " onclick="like(this)" id="like_'+post.id+'"></div>'+
                            '</div>';

                        if(!res.auth)
                        {
                            like=''
                        }

                        $('.newposts').append(
                            '<div class="cart col-12 col-xl-4 col-lg-6 col-md-6 col-sm-9">'+
                            '<a href="'+post.link+'">'+
                            '<img src="'+post.image+'" class="image-cart" alt="'+post.title+'">'+
                            '</a>'+
                            '<a href="'+post.link+'" class="color-black-hover">'+
                            '<p class="title-cart">'+post.title+'</p>'+
                            '</a>'+
                            like+
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
                        let hasLike = ''
                        if(post.is_Liked)
                        {
                            hasLike = 'like'
                        }
                        let hasSave = ''
                        if(post.is_Saved)
                        {
                            hasSave = 'save'
                        }
                        let like = '<div class="mx-lg-auto col-xl-7 mt-xl-5 py-1">'+
                            '<div class="saved '+hasSave+' col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block" onclick="save(this)" id="save_'+post.id+'"></div>'+
                            '<div class="heart '+hasLike+' col-2 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block " onclick="like(this)" id="like_'+post.id+'"></div>'+
                            '</div>';

                        if(!res.auth)
                        {
                            like=''
                        }
                        $('.popularposts').append(
                            '<div class="cart col-12 col-xl-4 col-lg-6 col-md-6 col-sm-9">'+
                            '<a href="'+post.link+'">'+
                            '<img src="'+post.image+'" class="image-cart" alt="'+post.title+'">'+
                            '</a>'+
                            '<a href="'+post.link+'" class="color-black-hover">'+
                            '<p class="title-cart">'+post.title+'</p>'+
                            '</a>'+
                            like+
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
