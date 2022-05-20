<?php

namespace App\Http\Trait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait Uploader
{
    public function upload(Request $request,$directory,$FileName,$orginalname=false,$date=false)
    {
        if ($orginalname){
            $image = $request->file($FileName)->storeAs(
                env('base_directory').$directory,
                $request->file($FileName)->getClientOriginalName()
            );
        }else{
            if ($date)
            {
                $date = '/'.now()->format('Y').'/'.now()->format('m').'/'.now()->format('d');
            }else{
                $date = '';
            }
            $image =  $request->file($FileName)->store(env('base_directory').$directory.$date);
        }
        return env('base_url').$image;
    }

    public function deleteImage($image)
    {
        $expImage = explode('/',$image);
        if (env('base_delete'))
        {
            unset($expImage[0]);
            unset($expImage[1]);
        }
        $impImage = implode('/',$expImage);
        Storage::delete($impImage);
    }
}
