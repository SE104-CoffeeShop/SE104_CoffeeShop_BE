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
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Tra sua',
                'image' => '',
                'unit_price' => 20000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Cafe den',
                'image' => '',
                'unit_price' => 15000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Bac siu',
                'image' => '',
                'unit_price' => 20000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Tra vai',
                'image' => '',
                'unit_price' => 25000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Sua chua',
                'image' => '',
                'unit_price' => 10000,
                'type' => 'đồ ăn',
            ],
            [
                'name' => 'Tra o long',
                'image' => '',
                'unit_price' => 23000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Tra lipton',
                'image' => '',
                'unit_price' => 15000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Tra dao',
                'image' => '',
                'unit_price' => 25000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Nuoc khoang',
                'image' => '',
                'unit_price' => 10000,
                'type' => 'đồ uống',
            ],
            [
                'name' => 'Coca',
                'image' => '',
                'unit_price' => 15000,
                'type' => 'đồ uống',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create($product);
        }
    }
}
