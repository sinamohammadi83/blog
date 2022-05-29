<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class MyCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-self-comment")
            ->only('index');
    }

    public function index(Post $post)
    {
        $this->checkAccessUser(auth()->user()->id,$post->user_id);

        return view('client.comment.index',[
            'post' => $post
        ]);
    }
}
