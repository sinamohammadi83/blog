<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        $explode = '';
        $cookieLogin = request()->cookie('login');
        if ($cookieLogin)
        {
            $explode = str($cookieLogin)->explode('|');
        }
        return view('website.login.create',[
            'cookieLogin' => $explode
        ]);
    }

    public function store(LoginRequest $request)
    {
        if ($request->get('remember'))
        {
            $emailAndPassword = $request->get('email') . '|' . $request->get('password');
            cookie()->queue('login',$emailAndPassword,60*24*30);
        }else{
            cookie()->queue(cookie()->forget('login'));
        }

        $user = User::query()->where('email',$request->get('email'))->where('status',1);

        if (!$user->exists())
        {
            return back()->withErrors(['ایمیل یا رمز عبور اشتباه است']);
        }

        $userFirst = $user->first();

        if (!Hash::check($request->get('password'),$userFirst->password))
        {
            return back()->withErrors(['ایمیل یا رمز عبور اشتباه است']);
        }

        auth()->login($userFirst);

        return to_route('website.home');
    }

    public function destroy()
    {
        auth()->logout();

        return to_route('website.login.create');
    }
}
