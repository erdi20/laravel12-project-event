<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'b@b.com',
                'password' => Hash::make('b'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'c@c.com',
                'password' => Hash::make('c'),
            ],
            [
                'name' => 'Manager User',
                'email' => 'd@d.com',
                'password' => Hash::make('d'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
