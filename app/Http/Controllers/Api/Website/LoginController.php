<?php

namespace App\Http\Controllers\Api\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        /**
         * @var User $user
         */

        $user = User::query()->where('email',$request->get('email'))->firstOrFail();

        

        $permissions = $user->role->permission()->pluck('title')->toArray();
        
        if(!Hash::check($request->get('password'), $user->password))
        {
            return response()->json([
                'data' => [
                    'message' => 'رمز عبور اشتباه است.'
                ]
            ])->setStatusCode(400);
        }

        $user->tokens()->delete();

        return response()->json([
            'data' => [
                'token' => $user->createToken('access_token',$permissions)->plainTextToken
            ]
        ])->setStatusCode(200);
    }
}
