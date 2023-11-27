<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyVoucherRequest;
use App\Models\Voucher;

class VoucherVerifyController extends Controller
{
    public function __invoke(VerifyVoucherRequest $request) {
        $voucherCode = $request->get('voucher_code');

        $voucher = Voucher::where('voucher_code', $voucherCode)->first();

        if ($voucher == null) {
            $data = [
                'is_available' => false,
                'voucher_type' => null,
                'voucher_amount' => null,
            ];
            return response($data, 200);
        }

        $voucherType = $voucher['type'];
        $voucherAmount = $voucher['amount'];

        $data = [
            'is_available' => true,
            'voucher_type' => $voucherType,
            'voucher_amount' => $voucherAmount,
        ];
        return response($data, 200);
    }
}
