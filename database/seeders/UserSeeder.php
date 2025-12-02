<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'na',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'Address' => 'na',
                'Is_Admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'email' => 'JohnDoe@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'Address' => 'Example123',
                'Is_Admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]
            );
    }
}
