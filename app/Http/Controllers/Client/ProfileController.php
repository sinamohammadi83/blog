<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UpdateProfileRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('client.profile.edit',[
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $emailExists = User::query()
            ->where('email',$request->get('email'))
            ->where('id','!=',auth()->user()->id)
            ->exists();
        if ($emailExists)
        {
            return back()->withErrors(['این ایمیل قبلا انتخاب شده است لطفا ایمیل دیگری را انتخاب کنید.']);
        }

        if ($request->file('image'))
        {
            $this->deleteImage(auth()->user()->image);
            $image = $this->upload($request,'users/profile','image');
        }else{
            $image = auth()->user()->image;
        }

        if ($request->get('password'))
        {
            $password = bcrypt($request->get('password'));
        }else{
            $password = auth()->user()->password;
        }

        auth()->user()->update([
            'name' => $request->get('name'),
            'family' => $request->get('family'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $password,
            'image' => $image
        ]);

        return back();
    }
}
