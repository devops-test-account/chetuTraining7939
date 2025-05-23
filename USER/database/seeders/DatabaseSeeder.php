<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'ChetuUser oOne',
            'email' => 'chetuuser01@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oTwo',
            'email' => 'chetuuser02@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oThree',
            'email' => 'chetuuser03@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oFour',
            'email' => 'chetuuser04@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oFive',
            'email' => 'chetuuser05@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oSix',
            'email' => 'chetuuser06@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oSeven',
            'email' => 'chetuuser07@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oEight',
            'email' => 'chetuuser08@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
        User::create([
            'name' => 'ChetuUser oNine',
            'email' => 'chetuuser09@yopmail.com',
            'password' => Hash::make('Test@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(12),
        ]);
    }
}
