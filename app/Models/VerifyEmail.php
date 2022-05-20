<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyEmail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $primaryKey = '';
    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'token';
    }

    public $timestamps = ["created_at"];

    const UPDATED_AT = null;

}
