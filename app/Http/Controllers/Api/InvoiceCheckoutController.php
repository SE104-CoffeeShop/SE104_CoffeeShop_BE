<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutInvoiceRequest;
use App\Models\Invoice;
use App\Services\CartService;
use App\Services\VoucherService;

class InvoiceCheckoutController extends Controller
{
    public function __invoke(CheckoutInvoiceRequest $request) {
        $cart = $request->input('cart');
        $voucherCode = $request->input('voucher_code');

        if ($voucherCode) {
            [
                'isAvailable' => $isVoucherAvailable,
                'voucherType' => $voucherType,
                'voucherAmount' => $voucherAmount,
                'voucher' => $voucher,
                'quantity' => $quantity,
            ] = VoucherService::verifyVoucher($voucherCode);

            if (! $isVoucherAvailable || $quantity < 1) {
                $data = [
                    'isSuccess' => false,
                    'message' => 'Voucher khong hop le hoac da het luot su dung, vui long xoa hoac kiem tra lai',
                ];
                return response($data, 200);
            }

            $totalPrice = CartService::calculateCart($cart);
            [$discountPrice, $finalPrice] = CartService::applyVoucher($totalPrice, $voucherType, $voucherAmount);

            Invoice::create([
                'user_id' => 1, //TODO
                'customer_id' => 1,
                'table_number' => 1,
                'voucher_code' => $voucherCode,
                'note' => null,
                'total_price' => $totalPrice,
                'discount_price' => $discountPrice,
                'final_price' => $finalPrice,
            ]);

            $voucher->update([
                'quantity' => $quantity - 1,
            ]);
        } else {
            $totalPrice = CartService::calculateCart($cart);

            Invoice::create([
                'user_id' => 1, //TODO
                'customer_id' => 1,
                'table_number' => 1,
                'voucher_code' => null,
                'note' => null,
                'total_price' => $totalPrice,
                'discount_price' => 0,
                'final_price' => $totalPrice,
            ]);
        }

        $data = [
            'isSuccess' => true,
            'message' => 'Da checkout thanh cong',
        ];

        return response($data, 200);
    }
}
