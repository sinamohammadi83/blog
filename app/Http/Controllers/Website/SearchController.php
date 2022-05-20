<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $q = request('q');
        $posts = Post::query()
            ->where('title','Like','%'.$q.'%')
            ->where('is_published',1)
            ->orderByDesc('id')
            ->get();

        return view('website.search.index',[
            'posts' => $posts,
            'q' => $q
        ]);
    }
}
