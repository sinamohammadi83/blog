<?php

namespace App\Http\Controllers;

use App\Http\Trait\CheckAccessUser;
use App\Http\Trait\Uploader;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,CheckAccessUser,Uploader;
}
