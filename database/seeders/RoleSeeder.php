<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PostPermission = Permission::query()
            ->whereIn('title',[
                'read-self-post',
                'create-post',
                'update-self-post',
                'delete-self-post',
                'view-client-dashboard',
                'read-gallery',
                'create-gallery',
                'update-gallery',
                'delete-gallery',
                'read-picture',
                'create-picture',
                'update-picture',
                'delete-picture'
            ])->get();
        $AdminRole = Role::query()->create([
            'title' => 'مدیر'
        ]);

        $AdminRole->permission()->attach(Permission::all());

        $UserRole = Role::query()->create([
            'title' => 'کاربر عادی'
        ]);

        $UserRole->permission()->attach($PostPermission);
    }
}
