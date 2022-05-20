<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\NewPasswordResetRequest;
use App\Http\Requests\Website\UpdatePasswordPasswordResetRequest;
use App\Mail\PasswordResetMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function create()
    {
        return view('website.passwordreset.create');
    }

    public function store(NewPasswordResetRequest $request)
    {
        $token = str()->random(20);

        PasswordReset::query()->create([
            'token' => $token,
            'email' => $request->get('email'),
        ]);

        Mail::to($request->get('email'))->send(new PasswordResetMail($token));

        return to_route('website.passwordreset.mail.success');
    }

    public function mailsuccess()
    {
        return view('website.passwordreset.mailsuccess');
    }

    public function passwordedit(PasswordReset $passwordReset)
    {
        return view('website.passwordreset.password',[
            'PasswordReset' => $passwordReset
        ]);
    }

    public function passwordupdate(PasswordReset $passwordReset,UpdatePasswordPasswordResetRequest $request)
    {
        $user = User::query()
            ->where('email',$passwordReset->email)
            ->firstOrFail();

        $user->update([
            'password' => bcrypt($request->get('password'))
        ]);

        return to_route('website.passwordreset.success');
    }

    public function success()
    {
        return view('website.passwordreset.success');
    }
}
