<div class="pe-xl-5 pe-lg-5">
    @foreach($post->oncomment() as $comment)
        <div class="shadow-lg mx-auto mx-lg-0 p-3 col-xl-8 col-lg-8 col-md-10 col-sm-10 col-11 ms-md-5 rounded-3 mt-5" id="comment-{{$comment->id}}">
        @can('delete-comment')
            <div class="float-start bg-danger rounded">
                <button class="color-7 border-0 p-2 rounded" wire:click="delete({{$comment->id}})"><img src="/website/icon/delete_1.png" alt=""></button>
            </div>
        @endcan
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
            <div class="cursor-pointer mt-3 reply" onclick="reply(this)" id="icon-reply-{{$comment->id}}">
                <img src="/website/icon/reply.png" class="icon-reply" alt="">پاسخ
            </div>
            <div class="cursor-pointer mt-3 d-none reply" onclick="reply(this)" id="icon-close-reply-{{$comment->id}}">
                <img src="/website/icon/icon_close.png" class="icon-reply" alt="">بستن
            </div>
        </div>
        <div class="reply-form col-xl-8 " style="display: none;" id="reply-{{$comment->id}}">
            @auth
            <form action="{{route('website.comment.awnser',['post' => $post , 'comment' => $comment])}}" method="post" class="my-3 p-2">
                @csrf
                <div class="form-group">
                    <label for="">متن نظر<span class="text-danger">*</span></label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" wire:model.lazy="content"></textarea>
                </div>
                <div class="form-group">
                    <input type="button" wire:click="reply({{$comment->id}})" class="rounded border-0 shadow-lg mt-2 submit-comment col-xl-1 col-lg-1 col-md-2 col-sm-2 col-3" value="ثبت">
                </div>
            </form>
            @else
                <div class="alert alert-warning col-8 mx-auto">برای نظر دادن <a class="text-warning text-decoration-none" href="{{route('website.login.create')}}">وارد شوید.</a></div>
            @endauth
        </div>
    </div>
        @foreach($comment->comments as $parentcomment)
            <div class="shadow-lg col-xl-8 p-3 col-10 col-lg-8 col-md-9 col-sm-9 ms-sm-5 ms-3 mx-auto ms-0 ms-md-5 me-lg-5 me-xl-5 rounded-3 mx-lg-0 mt-5 " style="background-color: #81ecec;" id="comment-{{$parentcomment->id}}">
                @can('delete-comment')
                    <div class="float-start bg-danger rounded">
                        <button class="color-7 border-0 p-2 rounded" wire:click="delete({{$parentcomment->id}})"><img src="/website/icon/delete_1.png" alt=""></button>
                    </div>
                @endcan
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
                    <div class="cursor-pointer mt-3 reply" onclick="reply(this)" id="icon-reply-{{$parentcomment->id}}">
                        <img src="/website/icon/reply.png" class="icon-reply" alt="">پاسخ
                    </div>
                    <div class="cursor-pointer mt-3 d-none reply" onclick="reply(this)" id="icon-close-reply-{{$parentcomment->id}}">
                        <img src="/website/icon/icon_close.png" class="icon-reply" alt="">بستن
                    </div>
                </div>
                <div class="reply-form col-xl-8 " style="display: none;" id="reply-{{$parentcomment->id}}">
                    @auth
                    <form action="{{route('website.comment.awnser',['post' => $post , 'comment' => $parentcomment])}}" method="post" class="my-3 p-2">
                        @csrf
                        <div class="form-group">
                            <label for="">متن نظر<span class="text-danger">*</span></label>
                            <textarea name="content" id="" cols="30" rows="10" wire:model.lazy="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" wire:click="reply({{$parentcomment->id}})" class="rounded border-0 shadow-lg mt-2 submit-comment col-xl-1 col-lg-1 col-md-2 col-sm-2 col-3" value="ثبت">
                        </div>
                    </form>
                    @else
                        <div class="alert alert-warning col-8 mx-auto">برای نظر دادن <a class="text-warning text-decoration-none" href="{{route('website.login.create')}}">وارد شوید.</a></div>
                    @endauth
                </div>
            </div>
            @foreach($parentcomment->comments as $childcomment)
                <div class="me-3 me-md-5">
                    <div class="shadow-lg col-xl-8 p-3 col-lg-8 col-md-8 col-sm-8 col-10 rounded-3 mt-5 mx-auto mx-lg-0 me-lg-5  me-xl-5 ms-sm-5 ms-2" style="background-color: #3498db;" id="{{$comment->childcomment}}">
                        @can('delete-comment')
                            <div class="float-start bg-danger rounded">
                                <button class="color-7 border-0 p-2 rounded" wire:click="delete({{$childcomment->id}})"><img src="/website/icon/delete_1.png" alt=""></button>
                            </div>
                        @endcan
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
