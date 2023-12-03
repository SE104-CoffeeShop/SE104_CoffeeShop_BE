<?php

namespace App\Services;

use App\Models\Voucher;

class VoucherService
{
    public static function verifyVoucher(string $voucherCode)
    {
        $voucher = Voucher::where('voucher_code', $voucherCode)->first();

        if ($voucher == null) {
            $data = [
                'isAvailable' => false,
                'voucherType' => null,
                'voucherAmount' => null,
                'quantity' => null,
                'voucher' => null,
            ];

            return $data;
        }

        $voucherType = $voucher['type'];
        $voucherAmount = $voucher['amount'];
        $quantity = $voucher['quantity'];
        $startDate = $voucher['start_date'];
        $endDate = $voucher['end_date'];

        $data = [
            'isAvailable' => true,
            'voucherType' => $voucherType,
            'voucherAmount' => $voucherAmount,
            'quantity' => $quantity,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'voucher' => $voucher,
        ];

        return $data;
    }
}
