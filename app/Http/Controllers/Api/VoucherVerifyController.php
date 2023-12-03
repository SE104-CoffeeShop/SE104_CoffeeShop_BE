<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyVoucherRequest;
use App\Services\VoucherService;

class VoucherVerifyController extends Controller
{
    public function __invoke(VerifyVoucherRequest $request)
    {
        $voucherCode = $request->get('voucher_code');

        [
            'isAvailable' => $isAvailable,
            'voucherType' => $voucherType,
            'voucherAmount' => $voucherAmount,
            'quantity' => $quantity,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ] = VoucherService::verifyVoucher($voucherCode);

        if (! $isAvailable) {
            $data = [
                'is_available' => false,
                'voucher_type' => null,
                'voucher_amount' => null,
                'quantity' => null,
                'message' => 'Voucher khong ton tai',
            ];

            return response()->json($data);
        }

        if ($quantity < 1) {
            $data = [
                'is_available' => true,
                'voucher_type' => null,
                'voucher_amount' => null,
                'message' => 'Voucher nay da het luot su dung',
            ];

            return response()->json($data);
        }

        $today = date('Y-m-d H:i:s');

        if ($today > $endDate) {
            $data = [
                'is_available' => true,
                'voucher_type' => null,
                'voucher_amount' => null,
                'message' => 'Voucher da het han',
            ];

            return response()->json($data);
        }

        if ($today < $startDate) {
            $data = [
                'is_available' => true,
                'voucher_type' => null,
                'voucher_amount' => null,
                'message' => 'Voucher chua den thoi han su dung',
            ];

            return response()->json($data);
        }

        $data = [
            'is_available' => true,
            'voucher_type' => $voucherType,
            'voucher_amount' => $voucherAmount,
            'message' => 'Verify voucher thanh cong',
        ];

        return response()->json($data);
    }
}
