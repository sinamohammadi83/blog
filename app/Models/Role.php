<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function haspermission($permission)
    {
        $Permission = Permission::query()->where('title',$permission)->first();

        return $this
            ->permission()
            ->where('permission_id',$Permission->id)
            ->exists();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
