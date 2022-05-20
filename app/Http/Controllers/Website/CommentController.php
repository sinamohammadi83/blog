<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\NewCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post,NewCommentRequest $request)
    {
        Comment::query()->create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'content' => $request->get('content')
        ]);

        return back();
    }

    public function awnser(Post $post,Comment $comment,NewCommentRequest $request)
    {
        $comment->comments()->create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'content' => $request->get('content')
        ]);

        return back();
    }
}
