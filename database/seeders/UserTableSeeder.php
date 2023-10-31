<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Start UserTableSeeder, seeder dimulai ... ";
        echo "\n";
        $datas = [
            [
                "name" => "Admin",
                "email" => "admin@mail.com",
                "role" => "admin"
            ],
            [
                "name" => "Customer",
                "email" => "customer@mail.com",
                "role" => "customer"
            ],
        ];
        foreach ($datas as $data) {
            // Seed Users with Roles
            $user = User::updateOrCreate(
                [
                    'email' => $data['email'],
                ],
                [
                    'name' => $data['name'],
                    'password' => bcrypt('p@ssword'),
                ]
            );
            $user->assignRole($data['role']);
        }

        echo "End UserTableSeeder, seeder selesai ... ";
        echo "\n";
    }
}
