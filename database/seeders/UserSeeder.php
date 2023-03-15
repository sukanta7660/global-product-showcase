<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'                  => 'Admin',
            'email'                 => 'admin@gmail.com',
            'email_verified_at'     => now(),
            'password'              => Hash::make('123456'), // password
            'remember_token'        => Str::random(10),
        ]);
        User::factory(10)->create();
    }
}
