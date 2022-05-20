<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::query()->where('title','مدیر')->firstOrFail();
        User::query()->create([
            'name' => 'سینا',
            'family' => 'محمدی',
            'username' => 'Sina1383',
            'email' => 'sina@gmail.com',
            'role_id' => $role->id,
            'password' => bcrypt('Sina1383'),
            'status' => true,
            'email_verified_at' => now()
        ]);
    }
}
