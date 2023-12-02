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
                'name' => 'Test product minus unit price',
                'image' => '',
                'unit_price' => -15000,
            ],
            [
                'name' => 'Test product double unit price',
                'image' => '',
                'unit_price' => 24000.1,
            ],
            [
                'name' => 'Test product very expensive price',
                'image' => '',
                'unit_price' => 9999999999,
            ],
            [
                'name' => '',
                'image' => '',
                'unit_price' => 10000,
            ],
            [
                'name' => 'Test product with no unit price',
                'image' => '',
                'unit_price' => '',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create($product);
        }
    }
}
