<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Requests\Client\NewUserRequest;
use App\Http\Requests\Client\UpdateUserRequest;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-user")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":create-user")
            ->only(['create','store']);
        $this->middleware(CheckPermissionMiddleware::class . ":update-user")
            ->only(['edit','update']);
        $this->middleware(CheckPermissionMiddleware::class . ":delete-user")
            ->only('destroy');
    }

    public function index()
    {
        return view('client.user.index',[
            'users' => User::all()->sortDesc()
        ]);
    }

    public function create()
    {
        return view('client.user.create',[
            'roles' => Role::all()
        ]);
    }

    public function store(NewUserRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $this->upload($request,'users/profile','image');
        }else{
            $image = '/website/image/profile.jpg';
        }

        User::query()->create([
            'name' => $request->get('name'),
            'family' => $request->get('family'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'image' => $image,
            'email_verified_at' => now(),
            'role_id' => $request->get('role'),
            'password' => bcrypt($request->get('password')),
            'status' => (boolean)$request->get('status'),
        ]);

        return to_route('client.user.index');
    }

    public function edit(User $user)
    {
        return view('client.user.edit',[
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(User $user,UpdateUserRequest $request)
    {
        if($request->file('image'))
        {
            Storage::delete($user->image);
            $image = $this->upload($request,'users/profile','image');
        }else{
            $image = $user->image;
        }

        if ($request->get('password'))
        {
            $password = bcrypt($request->get('password'));
        }else{
            $password = $user->password;
        }

        $user->update([
            'name' => $request->get('name'),
            'family' => $request->get('family'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'image' => $image,
            'role_id' => $request->get('role'),
            'password' => $password,
            'status' => (boolean)$request->get('status')
        ]);

        return to_route('client.user.index');
    }

    public function destroy(User $user)
    {

        Storage::delete($user->image);

        $galleries = $user->galleries()->get();

        foreach ($galleries as $gallery)
        {
            (new GalleryController())->destroy($gallery,true);
        }

        $posts = $user->posts()->get();

        foreach ($posts as $post)
        {
            (new PostController())->destroy($post);
        }

        $user->like()->detach();

        $user->saves()->detach();

        $user->comments()->delete();

        $user->startsupports()->delete();

        $user->supports()->delete();

        $user->user_received()->delete();

        $user->delete();

        return back();
    }
}
