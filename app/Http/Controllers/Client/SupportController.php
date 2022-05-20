<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Models\Role;
use App\Models\StartSupport;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-support")
            ->only(['index','show']);
        $this->middleware(CheckPermissionMiddleware::class . ":reply-support")
            ->only('reply');
//        $this->middleware(CheckPermissionMiddleware::class . ":delete-support")
//            ->only('destroy');
    }

    public function index()
    {
        return view('client.support.index',[
            'startsupports' => StartSupport::all()->sortDesc()
        ]);
    }

    public function show(StartSupport $startSupport)
    {
        $supports = Support::query()
            ->where('unique_code',$startSupport->unique_code)
            ->where('id','!=',$startSupport->support_id)
            ->get();
        return view('client.support.show',[
            'supports' => $supports,
            'startsupport' => $startSupport
        ]);
    }

    public function reply(StartSupport $startSupport,Request $request)
    {

        Support::query()->create([
            'user_send' => auth()->user()->id,
            'user_received' => $startSupport->user_id,
            'unique_code' => $startSupport->unique_code,
            'message' => $request->get('message'),
        ]);

        return back();
    }
}
