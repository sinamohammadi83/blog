<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\NewContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('website.contact.create');
    }

    public function store(NewContactRequest $request)
    {
        //در اینجا باید ایمیل مدیر وارد شود.
        Mail::to('sinamohammadi83a@gmail.com')->send(new ContactMail($request));

        return back();
    }
}
