<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10),
        //     'password' => Str::Random(10)
        // ]);

        $admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        $relawan = User::create([
            'username' => 'Relawan',
            'email' => 'relawan@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'relawan'
        ]);

        $donatur = User::create([
            'username' => 'Donatur',
            'email' => 'donatur@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'donatur'
        ]);
    }
}
