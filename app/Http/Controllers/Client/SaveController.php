<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function index()
    {
        return view('client.save.index',[
            'user' => auth()->user()
        ]);
    }

    public function destroy(Post $post)
    {
        auth()->user()->PostSave($post);

        return back();
    }
}
