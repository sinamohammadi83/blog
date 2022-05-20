<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Requests\Client\NewPostRequest;
use App\Http\Requests\Client\UpdatePostRequest;
use App\Http\Resources\Client\NewPostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-post")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":create-post")
            ->only(['create','store']);
        $this->middleware(CheckPermissionMiddleware::class . ":update-post")
            ->only(['edit','update']);
        $this->middleware(CheckPermissionMiddleware::class . ":delete-post")
            ->only('destroy');
    }

    public function index()
    {
        return view('client.post.index',[
            'posts' => Post::query()
                ->orderByDesc('id')
                ->paginate(30)
        ]);
    }

    public function create()
    {
        return view('client.post.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(NewPostRequest $request)
    {
        $image = $this->upload($request,'post','image');

        $explodeTitle = explode(' ',$request->get('title'));
        $slug = implode('-',$explodeTitle);

        $existsSlug = Post::query()->where('slug',$slug)->exists();

        if ($existsSlug)
        {
            $slug = $slug . '-' . random_int(11,99);
        }

        Post::query()->create([
            'title' => $request->get('title'),
            'image' => $image,
            'slug' => $slug,
            'content' => $request->get('content'),
            'category_id' => $request->get('category'),
            'comment' => (bool)$request->get('comment'),
            'is_published' => (bool)$request->get('published'),
            'user_id' => auth()->user()->id,
            'countLike' => 0
        ]);

        if(auth()->user()->role->haspermission('read-post'))
        {
            return to_route('client.post.index');
        }else
        {
            return to_route('client.myposts.index');
        }

    }

    public function edit(Post $post)
    {
        return view('client.post.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post,UpdatePostRequest $request)
    {
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
        ]);

        return to_route('client.post.index');
    }

    public function destroy(Post $post)
    {
        $this->deleteImage($post->image);

        $post->like()->detach();

        $post->saves()->detach();

        $post->comments()->delete();

        $post->delete();

        return to_route('client.post.index');
    }

    public function morepost(Request $request)
    {
        if ($request->get('page')=='null')
        {
            return '';
        }

        return response()->json([
            'posts' => NewPostResource::collection(Post::query()->orderByDesc('id')->paginate(30))->response()->getData()
        ])->setStatusCode(200);
    }
}
