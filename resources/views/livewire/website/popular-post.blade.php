<div>
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
                        <div class=" col-2 col-xl-1 col-lg-1 col-md-1 col-sm-1 d-inline-block ">
                            <div class="heart @if($post->hasLike()) like @endif " wire:click="like({{$post->id}})"></div>
                        </div>
                        <div class=" d-inline-block col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1" >
                            <div class="saved @if($post->hasSave()) save @endif " wire:click="save({{$post->id}})"></div>
                        </div>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <button class="btn btn-info btn-popularpost" wire:click="load">نمایش بیشتر پست های محبوب</button>
    </div>
</div>
