<?php

namespace App\Http\Trait;

use Illuminate\Http\Request;

trait CheckAccessUser
{
    public function checkAccessUser($user,$user_id)
    {
        if ($user!=$user_id)
        {
            abort(404);
        }
    }
}
