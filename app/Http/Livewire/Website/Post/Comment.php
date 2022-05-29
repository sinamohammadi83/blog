<?php

namespace App\Http\Livewire\Website\Post;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Livewire\Component;

class Comment extends Component
{
    public Post $post;

    public $content;

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

    public function reply(\App\Models\Comment $comment)
    {
        \App\Models\Comment::query()->create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'comment_id' => $comment->id,
            'content' => $this->content
        ]);

        $this->content='';
    }

    public function render()
    {
        return view('livewire.website.post.comment',[
            'post' => $this->post
        ]);
    }
}
