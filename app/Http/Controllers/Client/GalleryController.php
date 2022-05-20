<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Requests\Client\NewGalleryRequest;
use App\Http\Requests\Client\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-gallery")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":create-gallery")
            ->only(['create','store']);
        $this->middleware(CheckPermissionMiddleware::class . ":update-gallery")
            ->only(['edit','update']);
        $this->middleware(CheckPermissionMiddleware::class . ":delete-gallery")
            ->only('destroy');
    }

    public function index()
    {
        return view('client.gallery.index',[
            'user' => auth()->user()
                ->galleries()
                ->withCount('pictures')
                ->get()
        ]);
    }

    public function create()
    {
        return view('client.gallery.create');
    }

    public function store(NewGalleryRequest $request)
    {
        Gallery::query()->create([
            'title' => $request->get('title'),
            'user_id' => auth()->user()->id,
            'token' => str()->random(10)
        ]);

        return to_route('client.gallery.index');
    }

    public function edit(Gallery $gallery)
    {
        $this->checkAccessUser(auth()->user()->id,$gallery->user_id);

        return view('client.gallery.edit',[
            'gallery' => $gallery
        ]);
    }

    public function update(Gallery $gallery,UpdateGalleryRequest $request)
    {
        $this->checkAccessUser(auth()->user()->id,$gallery->user_id);

        $gallery->update([
            'title' => $request->get('title')
        ]);

        return to_route('client.gallery.index');
    }

    public function destroy(Gallery $gallery,$dontCheckAccess = false)
    {
        if (!$dontCheckAccess) {
            $this->checkAccessUser(auth()->user()->id, $gallery->user_id);
        }

        $pictures = $gallery->pictures()->get();

        foreach ($pictures as $picture) {
            (new PictureController())->destroy($gallery,$picture,true);
        }

        $gallery->delete();

        return to_route('client.gallery.index');
    }
}
