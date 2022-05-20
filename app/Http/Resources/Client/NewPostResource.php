<?php

namespace App\Http\Resources\Client;

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
        return [
            'link' => route('website.post.show',$this),
            'editlink' => route('client.post.edit',$this),
            'deletelink' => route('client.post.destroy',$this),
            'commentlink' => route('client.comment.index',$this),
            'title' => $this->title,
            'user' => $this->user->username,
            'category' => $this->category->title,
            'content' => str($this->content)->limit(30),
            'image' => $this->ImagePath
        ];
    }
}
