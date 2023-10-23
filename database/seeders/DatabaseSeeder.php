<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\History;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678')
        ]);
        
        $admin = User::create([
            'name' => 'admin',
            'email' => 'adm@admin.com',
            'password' => bcrypt('12345678')
        ]);

        $user_role  = Role::create(['name' => 'user']);
        $test  = Role::create(['name' => 'test']);
        $admin_role = Role::create(['name' => 'admin']);

        $user->assignRole($user_role);
        $user->assignRole($test);
        $admin->assignRole($admin_role);
    }
}
