<?php

namespace Database\Seeders;

use App\Models\Product;
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
            [
                'name' => 'Bac siu',
                'image' => '',
                'unit_price' => 20000,
            ],
            [
                'name' => 'Tra vai',
                'image' => '',
                'unit_price' => 25000,
            ],
            [
                'name' => 'Sua chua',
                'image' => '',
                'unit_price' => 10000,
            ],
            [
                'name' => 'Tra o long',
                'image' => '',
                'unit_price' => 23000,
            ],
            [
                'name' => 'Tra lipton',
                'image' => '',
                'unit_price' => 15000,
            ],
            [
                'name' => 'Test product with same name but difference price',
                'image' => '',
                'unit_price' => 1000,
            ],
            [
                'name' => 'Test product with same name but difference price',
                'image' => '',
                'unit_price' => 2000,
            ],
            [
                'name' => 'Test product with same name and same price',
                'image' => '',
                'unit_price' => 3000,
            ],
            [
                'name' => 'Test product with same name and same price',
                'image' => '',
                'unit_price' => 3000,
            ],
            [
                'name' => 'Tra dao',
                'image' => '',
                'unit_price' => 25000,
            ],
            [
                'name' => 'Nuoc khoang',
                'image' => '',
                'unit_price' => 10000,
            [
                'name' => 'Coca',
                'image' => '',
                'unit_price' => 15000,
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create($product);
        }
    }
}
