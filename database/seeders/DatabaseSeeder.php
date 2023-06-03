<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' =>  bcrypt('Test@123'),
            'remember_token' => \Str::random(10),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Instructor User',
            'email' => 'instructor@test.com',
            'email_verified_at' => now(),
            'password' =>  bcrypt('Test@123'),
            'remember_token' => \Str::random(10),
            'role' => 'instructor',
        ]);
        User::create([
            'name' => 'Student User',
            'email' => 'student@test.com',
            'email_verified_at' => now(),
            'password' =>  bcrypt('Test@123'),
            'remember_token' => \Str::random(10),
            'role' => 'user',
        ]);
    }
}
