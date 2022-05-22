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

    public function reply(Post $post,Comment $comment,Request $request)
    {
        Comment::query()->create([
            'comment_id' => $comment->id,
            'post_id' => $post->id,
            'content' => $request->get('content'),
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
