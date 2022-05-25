<?php

namespace App\Http\Livewire\Website\Post;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Livewire\Component;

class Comment extends Component
{
    public Post $post;

    public function delete(ModelsComment $comment)
    {
        $comments = $comment->comments()->get();

        foreach ($comments as $childcomment) {
            $childcomment->comments()->delete();
        }

        $comment->comments()->delete();

        $comment->delete();

        return back();
    }

    public function render()
    {
        return view('livewire.website.post.comment',[
            'post' => $this->post
        ]);
    }
}
