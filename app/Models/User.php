<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'family',
        'email',
        'password',
        'role_id',
        'username',
        'email_verified_at',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderByDesc('id');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function ImagePath():Attribute
    {
        return new Attribute(
            get: fn() => str_replace('public','/storage',$this->image)
        );
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class)->orderByDesc('id');
    }

    public function like()
    {
        return $this->belongsToMany(Post::class,'likes');
    }

    public function PostLike(Post $post)
    {
        $hasLike = $this->like()->where('post_id',$post->id);
        if (!$hasLike->exists()) {
            $this->like()->attach($post);
        }else{
            $this->like()->detach($post);
        }
    }

    public function saves()
    {
        return $this->belongsToMany(Post::class,'saves');
    }

    public function PostSave(Post $post)
    {
        $hasSave = $this->saves()->where('post_id',$post->id);
        if (!$hasSave->exists()){
            $this->saves()->attach($post);
        }else{
            $this->saves()->detach($post);
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function supports()
    {
        return $this->hasMany(Support::class,'user_send');
    }

    public function user_received()
    {
        return $this->hasMany(Support::class,'user_received');
    }

    public function count_awnser($unique_code)
    {
        return $this->user_received()
            ->where('unique_code',$unique_code)
            ->count();
    }

    public function startsupports()
    {
        return $this->hasMany(StartSupport::class)->orderByDesc('id');
    }

    /*public function delete_supports()
    {
        $supports = Support::query()
            ->where('user_send',4)->get()
    ;
        dd($supports);
        foreach ($supports as $support){
            $support->delete();
        }
    }*/
}
