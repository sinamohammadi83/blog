<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\NameRgisterRequest;
use App\Http\Requests\Website\PasswordRegisterRequest;
use App\Http\Requests\Website\ProfileRegisterRequest;
use App\Http\Requests\Website\RegisterRequest;
use App\Http\Requests\Website\VerifyEmailRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\VerifyEmail;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('website.register.create');
    }


    public function store(RegisterRequest $request)
    {
        $token= str()->random(20);

        $role = Role::query()->where('title','کاربر عادی')->firstOrFail();

        $exploadeEmail = str($request->get('email'))->explode('@');

        $username = str($exploadeEmail[0])->substr('0','7') . random_int(11111,99999);

        User::query()->create([
            'role_id' => $role->id,
            'email' => $request->get('email'),
            'username' => $username,
            'status' => true
        ]);

        VerifyEmail::query()->create([
            'email' => $request->get('email'),
            'token' => $token
        ]);

        Mail::to($request->get('email'))->send(new \App\Mail\VerifyEmail($token));


        return to_route('website.register.success');
    }

    public function success()
    {
        return view('website.register.success');
    }

    public function verifyemail(VerifyEmail $verifyEmail)
    {
        $user = User::query()
            ->where('email',$verifyEmail->email)
            ->firstOrFail();

        $user->update([
            'email_verified_at' => now()
        ]);

        return to_route('website.register.name',$verifyEmail);
    }

    public function name(VerifyEmail $verifyEmail)
    {
        return view('website.register.name',[
            'verifyEmail' => $verifyEmail
        ]);
    }

    public function namestore(VerifyEmail $verifyEmail,NameRgisterRequest $request)
    {
        $user = User::query()->where('email',$verifyEmail->email)->firstOrFail();

        $user->update([
            'name' => $request->get('name'),
            'family' => $request->get('family'),
        ]);

        return to_route('website.register.password',$verifyEmail);
    }

    public function password(VerifyEmail $verifyEmail)
    {
        return view('website.register.password',[
            'verifyEmail' => $verifyEmail
        ]);
    }

    public function passwordstore(VerifyEmail $verifyEmail,PasswordRegisterRequest $request)
    {
        $user = User::query()->where('email',$verifyEmail->email)->firstOrFail();

        $user->update([
            'password' => bcrypt($request->get('password'))
        ]);

        return to_route('website.register.profile',$verifyEmail);
    }

    public function profile(VerifyEmail $verifyEmail)
    {
        return view('website.register.profile',[
            'verifyEmail' => $verifyEmail
        ]);
    }

    public function profilestore(VerifyEmail $verifyEmail,ProfileRegisterRequest $request)
    {

        $user = User::query()->where('email',$verifyEmail->email)->firstOrFail();
        if ($request->file('image'))
        {
            $image = $this->upload($request,'users/profile','image');
        }else
        {
            $image = $user->image;
        }

        $user->update([
            'image' => $image
        ]);

        auth()->login($user);

        return to_route('website.home');
    }
}
