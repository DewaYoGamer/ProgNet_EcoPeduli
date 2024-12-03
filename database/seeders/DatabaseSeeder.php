<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'email_verified_at' => now()
        ]);

        User::factory()->create([
            'name' => 'operator',
            'email' => 'operator@operator.com',
            'username' => 'operator',
            'password' => bcrypt('operator123'),
            'role' => 'operator',
            'email_verified_at' => now()
        ]);

        User::factory()->create([
            'name' => 'yogaa',
            'email' => 'dewaanoc135@gmail.com',
            'username' => 'yoga1',
            'password' => bcrypt('11111'),
            'role' => 'user',
            'email_verified_at' => now()
        ]);
    }
}
