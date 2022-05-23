<div class="text-center col-xl-4 col-lg-3 col-md-3 col-12 col-sm-12">
    <div class="post-saved @if($post->hasSave()) save @endif mt-2" wire:click="save()"></div>
    <span id="count-like" >{{$likeCount}}</span><div class="post-heart @if($post->hasLike()) like @endif" wire:click="like()"></div>
</div>
