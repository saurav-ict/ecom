<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // 1. Create Admin Users (2 users)
        $admins = [
            [
                'name' => 'Admin User One',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '1234567890',
                'address' => '123 Admin St, City, Country',
            ],
            [
                'name' => 'Admin User Two',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '0987654321',
                'address' => '456 Admin Ave, City, Country',
            ]
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(['email' => $admin['email']], $admin);
        }

        // 2. Create Customer Users (13 users to reach 15 total)
        for ($i = 0; $i < 13; $i++) {
            User::updateOrCreate(
                ['email' => $faker->unique()->safeEmail()],
                [
                    'name' => $faker->name(),
                    'password' => Hash::make('password'),
                    'role' => 'customer',
                    'phone' => $faker->phoneNumber(),
                    'address' => $faker->address(),
                ]
            );
        }
    }
}
