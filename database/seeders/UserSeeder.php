<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        User::create(['name' => 'Ayo John', 'email' => 'john@example.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Joy Peter', 'email' => 'joy@example.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Samuel Segun', 'email' => 'samuel@example.com', 'password' => Hash::make('password')]);
    }
}
