<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','title'];

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function onposts()
    {
        return $this->posts()
            ->where('is_published',1)
            ->orderByDesc('id')
            ->paginate(6);
    }
}
