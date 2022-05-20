<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class)->orderByDesc('id');
    }


}
