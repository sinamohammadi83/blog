<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'unique_code';
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_send');
    }

    public function startsupport()
    {
        return $this->hasOne(StartSupport::class);
    }

}
