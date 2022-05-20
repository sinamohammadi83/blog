<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Requests\Client\NewPictureRequest;
use App\Models\Gallery;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-picture")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":create-picture")
            ->only('store');
        $this->middleware(CheckPermissionMiddleware::class . ":delete-picture")
            ->only('destroy');
    }

    public function index(Gallery $gallery)
    {
        $this->checkAccessUser(auth()->user()->id,$gallery->user_id);

        return view('client.picture.index',[
            'gallery' => $gallery
        ]);
    }

    public function store(Gallery $gallery,NewPictureRequest $request)
    {
        $this->checkAccessUser(auth()->user()->id,$gallery->user_id);

        $image = $this->upload($request,'gallery','image');

        Picture::query()->create([
            'gallery_id' => $gallery->id,
            'image' => $image
        ]);

        return back();
    }

    public function destroy(Gallery $gallery,Picture $picture,$dontCheckAccess=false)
    {
        if(!$dontCheckAccess) {
            $this->checkAccessUser(auth()->user()->id, $gallery->user_id);
        }

        $this->deleteImage($picture->image);

        $picture->delete();

        return back();
    }
}
