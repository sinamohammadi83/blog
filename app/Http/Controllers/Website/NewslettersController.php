<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\NewNewslettersRequest;
use App\Mail\NewslettersMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewslettersController extends Controller
{
    public function store(NewNewslettersRequest $request)
    {
        Newsletter::query()->create([
            'email' => $request->get('email')
        ]);

        return response()->json([
            'data' => [
                'message' => 'ایمیل شما با موفقیت ثبت شد.'
            ]
        ])->setStatusCode(200);
    }
}
