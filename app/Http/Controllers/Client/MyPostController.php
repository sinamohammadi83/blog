<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MyPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-self-post")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":update-self-post")
            ->only(['edit','update']);
        $this->middleware(CheckPermissionMiddleware::class . ":delete-self-post")
            ->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('client.mypost.index',[
            'user' => auth()->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        $this->checkAccessUser(auth()->user()->id,$post->user_id);

        return view('client.mypost.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $this->checkAccessUser(auth()->user()->id,$post->user_id);

        if ($request->file('image'))
        {
            Storage::delete($post->image);
            $image = $this->upload($request,'post','image');
        }else{
            $image = $post->image;
        }

        $explodeTitle = explode(' ',$request->get('title'));
        $slug = implode('-',$explodeTitle);

        $existsSlug = Post::query()
            ->where('slug',$slug)
            ->where('id','!=',$post->id)
            ->exists();

        if ($existsSlug)
        {
            $slug = $slug . '-' . random_int(11,99);
        }

        $post->update([
            'title' => $request->get('title'),
            'image' => $image,
            'slug' => $slug,
            'content' => $request->get('content'),
            'category_id' => $request->get('category'),
            'comment' => (bool)$request->get('comment'),
            'is_published' => (bool)$request->get('published'),
            'user_id' => auth()->user()->id
        ]);

        return to_route('client.myposts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $this->checkAccessUser(auth()->user()->id, $post->user_id);

        $this->deleteImage($post->image);

        $post->like()->detach();

        $post->saves()->detach();

        $post->comments()->delete();

        $post->delete();

        return to_route('client.myposts.index');
    }
}
