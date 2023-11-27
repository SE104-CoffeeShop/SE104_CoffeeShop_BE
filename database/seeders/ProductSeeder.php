<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::truncate();

        $products = [
            [
                'name' => 'Tra da',
                'image' => '',
                'unit_price' => 2000,
            ],
            [
                'name' => 'Tra sua',
                'image' => '',
                'unit_price' => 20000,
            ],
            [
                'name' => 'Cafe den',
                'image' => '',
                'unit_price' => 15000,
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create($product);
        }
    }
}
