<?php

namespace App\Http\Livewire\Website;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class NewPost extends Component
{
    public $posts;

    public Post $post;

    public $amount = 6;

    public function load()
    {
        $this->amount +=6;
    }

    public function render()
    {
        $this->posts =  Post::query()
            ->where('is_published',1)
            ->orderByDesc('id')
            ->take($this->amount)
            ->get();

        return view('livewire.website.new-post',[
            'posts' => $this->posts
        ]);
    }

    public function like($post_id)
    {
        $post = Post::query()->findOrFail($post_id);
        auth()->user()->PostLike($post);
        $post->update([
            'countLike' => $post->like()->count()
        ]);
    }

    public function save($post_id)
    {
        $post = Post::query()->findOrFail($post_id);
        auth()->user()->PostSave($post);
    }
}
