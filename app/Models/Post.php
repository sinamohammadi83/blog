<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
/*    protected $appends = [
        'ImagePath'
    ];*/

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function ImagePath():Attribute
    {
        return new Attribute(
            get: fn() => str_replace('public','/storage',$this->image)
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->belongsToMany(User::class,'likes');
    }

    public function hasLike()
    {
         return $this
            ->like()
            ->where('user_id',auth()->user()->id)
            ->exists();
    }

    public function saves()
    {
        return $this->belongsToMany(User::class,'saves');
    }

    public function hasSave()
    {
        return $this
            ->saves()
            ->where('user_id',auth()->user()->id)
            ->exists();
    }

    public function oncomment()
    {
        return $this->comments()->whereNull('comment_id')->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderByDesc('id');
    }
}
