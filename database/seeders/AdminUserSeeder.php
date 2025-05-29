<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            'employee_id' => 'EMP001',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // secure password
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
            'dob' => '1980-01-01',
            'doj' => '2020-01-01',
        ]);
    }
}
