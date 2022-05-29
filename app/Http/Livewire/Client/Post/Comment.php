<?php

namespace App\Http\Livewire\Client\Post;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Livewire\Component;

class Comment extends Component
{
    public Post $post;

    public $content;

    public function reply(ModelsComment $comment)
    {
        ModelsComment::query()->create([
            'comment_id' => $comment->id,
            'post_id' => $this->post->id,
            'content' => $this->content,
            'user_id' => auth()->id()
        ]);

        $this->content = '';
    }

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
        return view('livewire.client.post.comment',[
            'post' => $this->post
        ]);
    }
}
