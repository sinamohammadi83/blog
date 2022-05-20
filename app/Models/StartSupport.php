<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartSupport extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function support()
    {
        return $this->belongsTo(Support::class);
    }

    public function getRouteKeyName()
    {
        return 'unique_code' ;
    }

    public function count_reply($unique_code,$user_send)
    {
        return Support::query()
            ->where('unique_code',$unique_code)
            ->where('user_received',$user_send)
            ->count();
    }
}
