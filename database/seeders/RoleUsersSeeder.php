<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Dava Rezza',
                'email' => 'dava20@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Approver',
                'email' => 'approver@gmail.com',
                'role' => 'approver',
                'password' => bcrypt('123'),
            ],
        ];

        foreach ($userData as $data) {
            User::create($data);
        }
    }
}
