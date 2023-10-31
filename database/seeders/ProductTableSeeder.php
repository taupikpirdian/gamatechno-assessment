<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Start ProductTableSeeder, seeder dimulai ... ";
        echo "\n";
        $datas = [
            [
                "name" => "PS 5",
                "price" => 12500000,
            ],
            [
                "name" => "Joy Stick",
                "price" => 1000000,
            ],
        ];
        foreach ($datas as $data) {
            // Seed Users with Roles
            Product::create(
                [
                    'name' => $data['name'],
                    'price' => $data['price'],
                ]
            );
        }

        echo "End ProductTableSeeder, seeder selesai ... ";
        echo "\n";
    }
}
