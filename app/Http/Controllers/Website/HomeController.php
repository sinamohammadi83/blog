<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Resources\Website\NewPostResource;
use App\Models\CountLike;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home',[
            'posts' => Post::query()
                ->withExists(['like','saves'])
                ->where('is_published',1)
                ->orderByDesc('id')
                ->take(6)
                ->get(),
            'popularPost' => Post::query()
                ->orderByDesc('countLike')
                ->take(6)
                ->get()
        ]);
    }

    public function moreNewPost(Request $request)
    {
        if ($request->get('page')=='null')
        {
            return '';
        }

        return response()->json([
            'posts' => NewPostResource::collection(Post::query()->orderByDesc('id')->paginate(6))->response()->getData(),
            'auth' => auth()->check()
        ])->setStatusCode(200);
    }

    public function morePopularPost(Request $request)
    {
        if ($request->get('page')=='null')
        {
            return '';
        }

        return response()->json([
            'posts' => NewPostResource::collection(Post::query()->orderByDesc('countLike')->paginate(6))->response()->getData(),
            'auth' => auth()->check()
        ])->setStatusCode(200);
    }
}
