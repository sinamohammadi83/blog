<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Requests\Client\NewRoleRequest;
use App\Http\Requests\Client\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-role")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":create-role")
            ->only(['create','store']);
        $this->middleware(CheckPermissionMiddleware::class . ":update-role")
            ->only(['edit','update']);
        $this->middleware(CheckPermissionMiddleware::class . ":delete-role")
            ->only('destroy');
    }

    public function index()
    {
        return view('client.role.index',[
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return view('client.role.create',[
            'permissions' => Permission::all()
        ]);
    }

    public function store(NewRoleRequest $request)
    {
        $role = Role::query()->create([
            'title' => $request->get('title')
        ]);

        $role->permission()->attach($request->get('permissions'));

        return to_route('client.role.index');
    }

    public function edit(Role $role)
    {
        return view('client.role.edit',[
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role,UpdateRoleRequest $request)
    {
        $role->update([
            'title' => $request->get('title')
        ]);

        $role->permission()->sync($request->get('permissions'));

        return to_route('client.role.index');
    }

    public function destroy(Role $role)
    {
        $UserRole = Role::query()->where('title','کاربر عادی')->firstOrFail();
        if ($role->users()->exists())
        {
            $role->users()->update([
                'role_id' =>  $UserRole->id
            ]);
        }

        $role->permission()->detach();

        $role->delete();

        return back();
    }
}
