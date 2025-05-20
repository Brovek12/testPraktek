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
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'phone' => '08123456789',
                'username' => 'admin',
                'password' => Hash::make('123123'),
                'role' => 'Admin'
            ],
            [
                'name' => 'Site A',
                'email' => 'sitea@example.com',
                'phone' => '08123456789',
                'username' => 'site123',
                'password' => Hash::make('123123'),
                'role' => 'Site',
                'warehouse_id' => '1'
            ],
            [
                'name' => 'HO',
                'email' => 'ho@example.com',
                'phone' => '08123456789',
                'username' => 'ho1234',
                'password' => Hash::make('123123'),
                'role' => 'HO',
                'warehouse_id' => '2'
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'phone' => $userData['phone'],
                'username' => $userData['username'],
                'password' => $userData['password'],
                'warehouse_id' => $userData['warehouse_id'] ?? null,
            ]);

            $user->assignRole($userData['role']);
        }
    }
}
