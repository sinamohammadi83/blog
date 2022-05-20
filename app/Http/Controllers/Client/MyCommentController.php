<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class MyCommentController extends Controller
{
    public function index(Post $post)
    {
        $this->checkAccessUser(auth()->user()->id,$post->user_id);

        return view('client.comment.index',[
            'post' => $post
        ]);
    }

    public function destroy(Post $post,Comment $comment,$dontCheckAccess = false)
    {
        if (!$dontCheckAccess)
        {
            $this->checkAccessUser(auth()->user()->id,$post->user_id);
        }

        $comments = $comment->comments()->get();

        foreach ($comments as $childcomment) {
            $childcomment->comments()->delete();
        }

        $comment->comments()->delete();

        $comment->delete();

        return back();
    }
}
