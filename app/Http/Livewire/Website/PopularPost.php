<?php

namespace App\Http\Livewire\Website;

use App\Models\Post;
use Livewire\Component;

class PopularPost extends Component
{

    public $posts;

    public $amount = 6;

    public function load()
    {
        $this->amount +=6;
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

    public function render()
    {
        $this->posts = Post::query()
            ->where('is_published',1)
            ->orderByDesc('countLike')
            ->take($this->amount)
            ->get();

        return view('livewire.website.popular-post',[
            'popularPost' => $this->posts
        ]);
    }
}
