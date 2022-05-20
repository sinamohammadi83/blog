<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Models\Role;
use App\Models\StartSupport;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;

class MySupportController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":create-support")
            ->only(['create','store']);
    }

    public function index()
    {
        return view('client.mysupport.index',[
            'user' => auth()->user()
        ]);
    }

    public function create()
    {
        return view('client.mysupport.create');
    }

    public function store(Request $request)
    {
        $role = Role::query()->where('title','مدیر')->firstOrFail();
        $user_received = User::query()->where('role_id',$role->id)->firstOrFail();
        $unique_code = rand();
        $support = Support::query()->create([
            'user_send' => auth()->user()->id,
            'user_received' => $user_received->id,
            'unique_code' => $unique_code,
            'message' => $request->get('message'),
        ]);

        $support->startsupport()->create([
            'unique_code' => $unique_code,
            'user_id' => auth()->user()->id,
            'title' => $request->get('title'),
        ]);

        return to_route('client.mysupport.show',$support->startsupport);
    }

    public function show(StartSupport $startSupport)
    {
        $supports = Support::query()
            ->where('unique_code',$startSupport->unique_code)
            ->where('id','!=',$startSupport->support_id)
            ->get();
        return view('client.mysupport.show',[
            'supports' => $supports,
            'startsupport' => $startSupport
        ]);
    }

    public function reply(StartSupport $startSupport,Request $request)
    {
        $role = Role::query()->where('title','مدیر')->firstOrFail();

        $user_received = User::query()->where('role_id',$role->id)->firstOrFail();

        Support::query()->create([
            'user_send' => auth()->user()->id,
            'user_received' => $user_received->id,
            'unique_code' => $startSupport->unique_code,
            'message' => $request->get('message'),
        ]);

        return back();
    }
}
