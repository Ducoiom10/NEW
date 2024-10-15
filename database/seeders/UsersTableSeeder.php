<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo 3 bản ghi cho bảng users
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Mã hóa mật khẩu
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Regular User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'), // Mã hóa mật khẩu
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Regular User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'), // Mã hóa mật khẩu
            'role' => 'user',
        ]);
    }
}