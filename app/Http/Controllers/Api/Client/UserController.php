<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ApiCheckPermissionMiddleware;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(ApiCheckPermissionMiddleware::class . ":read-user")
            ->only('index');
    }
    public function index()
    {
        return response()->json([
            'data' => [
                'users' => User::all()
            ]
        ])->setStatusCode(200);
    }
}
