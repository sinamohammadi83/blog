<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function store()
    {
        $post = Post::query()->where('slug',request('post'))->firstOrFail();

        auth()->user()->PostSave($post);

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ])->setStatusCode(200);
    }
}
