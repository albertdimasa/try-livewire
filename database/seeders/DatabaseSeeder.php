<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\History;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'demo',
            'email' => 'demo@example.com',
            'password' => bcrypt('12345678')
        ]);
        
        User::create([
            'name' => 'demo',
            'email' => 'demo@example.com',
            'password' => bcrypt('12345678')
        ]);

        History::create([
            'task'=>'Gagal',
            'user_id'=>0
        ]);
    }
}
