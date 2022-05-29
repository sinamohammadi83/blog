<div>
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
                <button class="color-6 col-2 rounded mt-2 justify-content-center p-2 d-flex reply border-0" onclick="reply(this)" data-comment-id="{{$comment->id}}">
                    پاسخ
                    <img src="/website/icon/icon_sort_down.png" width="15px" class="h-50 mt-1" alt="">
                </button>
                <div class="col-12 bg-white mt-3 p-3 rounded" style="display: none" id="reply-{{$comment->id}}">
                    <p class="text-end">پاسخ</p>
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" wire:model.lazy="content" name="content" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" wire:click="reply({{$comment->id}})" value="ثبت" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <div class="mt-3 rounded-7 color-7 ">
                    <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" wire:click="delete({{$comment->id}})" type="submit">
                        <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                        حذف
                    </button>
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
                    <button class="color-6 col-2 rounded mt-2 justify-content-center p-2 d-flex reply border-0" onclick="reply(this)" data-comment-id="{{$parentcomment->id}}">
                        پاسخ
                        <img src="/website/icon/icon_sort_down.png" width="15px" class="h-50 mt-1" alt="">
                    </button>
                    <div class="col-12 bg-white mt-3 p-3 rounded" style="display: none" id="reply-{{$parentcomment->id}}">
                        <p class="text-end">پاسخ</p>
                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" wire:model.lazy="content" name="content" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="button" wire:click="reply({{$parentcomment->id}})" value="ثبت" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                    <div class="mt-3 rounded-7 color-7 ">
                        <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" wire:click="delete({{$parentcomment->id}})" type="submit">
                            <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                            حذف
                        </button>
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
                            <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" wire:click="delete({{$childcomment->id}})" type="submit">
                                <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                                حذف
                            </button>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endforeach
</div>
