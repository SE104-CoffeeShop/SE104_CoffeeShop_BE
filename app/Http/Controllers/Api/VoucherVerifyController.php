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
                'message' => 'Voucher không tồn tại',
            ];

            return response()->json($data);
        }

        if ($quantity < 1) {
            $data = [
                'is_available' => false,
                'voucher_type' => null,
                'voucher_amount' => null,
                'message' => 'Voucher này đã hết lượt sử dụng',
            ];

            return response()->json($data);
        }

        $today = date('Y-m-d H:i:s');

        if ($today > $endDate) {
            $data = [
                'is_available' => false,
                'voucher_type' => null,
                'voucher_amount' => null,
                'message' => 'Voucher đã hết hạn',
            ];

            return response()->json($data);
        }

        if ($today < $startDate) {
            $data = [
                'is_available' => false,
                'voucher_type' => null,
                'voucher_amount' => null,
                'message' => 'Voucher chưa đến thời gian sử dụng',
            ];

            return response()->json($data);
        }

        $data = [
            'is_available' => true,
            'voucher_type' => $voucherType,
            'voucher_amount' => $voucherAmount,
            'message' => 'Verify voucher thành công',
        ];

        return response()->json($data);
    }
}
