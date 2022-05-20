<?php

namespace App\Http\Resources\Website;

use Illuminate\Http\Resources\Json\JsonResource;

class NewPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $is_Liked = auth()->check()?$this->hasLike():'';
        $is_Saved = auth()->check()?$this->hasSave():'';
        return [
            'id' => $this->slug,
            'link' => route('website.post.show',$this),
            'title' => $this->title,
            'content' => str($this->content)->limit(30),
            'image' => $this->ImagePath,
            'is_Liked' => $is_Liked ,
            'is_Saved' => $is_Saved
        ];
    }
}
