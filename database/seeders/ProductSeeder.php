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
                'name' => 'Trà đá',
                'image' => '',
                'unit_price' => 2000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Trà sữa',
                'image' => '',
                'unit_price' => 20000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Cafe đen',
                'image' => '',
                'unit_price' => 15000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Bạc sỉu',
                'image' => '',
                'unit_price' => 20000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Trà vải',
                'image' => '',
                'unit_price' => 25000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Sữa chua',
                'image' => '',
                'unit_price' => 10000,
                'type' => 'Đồ ăn',
            ],
            [
                'name' => 'Trà ô long',
                'image' => '',
                'unit_price' => 23000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Trà lipton',
                'image' => '',
                'unit_price' => 15000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Trà đào',
                'image' => '',
                'unit_price' => 25000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Nước khoáng',
                'image' => '',
                'unit_price' => 10000,
                'type' => 'Đồ uống',
            ],
            [
                'name' => 'Coca',
                'image' => '',
                'unit_price' => 15000,
                'type' => 'Đồ uống',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create($product);
        }
    }
}
