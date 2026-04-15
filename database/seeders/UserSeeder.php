<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer@demo.com'],
            [
                'name'     => 'John Customer',
                'password' => Hash::make('password'),
                'role'     => 'customer',
                'phone'    => '+1 555 000 1234',
                'address'  => '123 Main St, New York, NY 10001',
            ]
        );
    }
}
