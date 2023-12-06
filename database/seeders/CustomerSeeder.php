<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::truncate();

        $customers = [
            [
                'name' => 'Khach hang than thiet 1',
                'phone_number' => '0987654321',
            ],
            [
                'name' => 'Khach hang than thiet 2',
                'phone_number' => '0999999999',
            ],
            [
                'name' => 'Khach hang than thiet 3',
                'phone_number' => '0123456789',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::query()->create($customer);
        }
    }
}
