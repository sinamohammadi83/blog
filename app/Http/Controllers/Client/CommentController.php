<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return view('client.comment.index',[
            'post' => $post
        ]);
    }

    public function destroy(Post $post,Comment $comment)
    {

        $comments = $comment->comments()->get();

        foreach ($comments as $childcomment) {
            $childcomment->comments()->delete();
        }

        $comment->comments()->delete();

        $comment->delete();

        return back();
    }
}
