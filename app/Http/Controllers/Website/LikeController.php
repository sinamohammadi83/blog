<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store()
    {
        $post = Post::query()->where('slug',request('post'))->firstOrFail();

        auth()->user()->PostLike($post);

        $post->update([
            'countLike' => $post->like->count()
        ]);

        return response()->json([
            'data' => [
                'message' => 'success',
                'likes' => [
                    'count' => $post->like->count()
                ]
            ]
        ])->setStatusCode(200);
    }
}
