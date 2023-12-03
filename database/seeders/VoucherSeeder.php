<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    public function run()
    {
        Voucher::truncate();

        $vouchers = [
            [
                'voucher_code' => 'GIAMGIA10K',
                'type' => 'direct',
                'amount' => 10000,
                'quantity' => 999,
                'start_date' => date('Y-m-d', strtotime('09/28/2023')),
                'end_date' => date('Y-m-d', strtotime('01/01/2025')),
            ],
            [
                'voucher_code' => 'GIAMGIA50%',
                'type' => 'percent',
                'amount' => 50,
                'quantity' => 999,
                'start_date' => date('Y-m-d', strtotime('09/28/2023')),
                'end_date' => date('Y-m-d', strtotime('01/01/2025')),
            ],
            [
                'voucher_code' => 'GIAMGIA5K',
                'type' => 'direct',
                'amount' => 5000,
                'quantity' => 2,
                'start_date' => date('Y-m-d', strtotime('09/28/2023')),
                'end_date' => date('Y-m-d', strtotime('01/01/2025')),
            ],
            [
                'voucher_code' => 'KM1111',
                'type' => 'direct',
                'amount' => 1000,
                'quantity' => 10,
                'start_date' => date('Y-m-d', strtotime('11/11/2023')),
                'end_date' => date('Y-m-d', strtotime('11/11/2023')),
            ],
            [
                'voucher_code' => 'TEST_VOUCHER_START_END_DATE4',
                'type' => 'direct',
                'amount' => 100,
                'quantity' => 10,
                'start_date' => date('Y-m-d', strtotime('10/01/2024')),
                'end_date' => date('Y-m-d', strtotime('12/31/2024')),
            ],
        ];

        foreach ($vouchers as $voucher) {
            Voucher::query()->create($voucher);
        }
    }
}
