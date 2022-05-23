<?php

namespace App\Http\Livewire\Website\Post;

use App\Models\Post;
use Livewire\Component;

class PostLikeSave extends Component
{
    public Post $post;
    public $likeCount;

    public function save()
    {
        auth()->user()->PostSave($this->post);
        $this->render();
    }

    public function like()
    {
        auth()->user()->PostLike($this->post);
        $this->render();
    }

    public function render()
    {
        $this->likeCount = $this->post->like->count();
        return view('livewire.website.post.post-like-save',[
            'post' => $this->post,
            'likeCount' => $this->likeCount
        ]);
    }


}
