<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function calculateCart(array $cart) {
        $productIdList = [];

        foreach ($cart as $pair) {
            $productIdList[] = $pair['product_id'];
        }

        $products = Product::whereIn('id', $productIdList)->pluck('unit_price', 'id');

        $totalPrice = 0;

        foreach ($cart as $pair) {
            $productId = $pair['product_id'];
            $quantity = $pair['quantity'];

            $unitPrice = $products[$productId];

            $totalPrice += $unitPrice * $quantity;
        }

        return $totalPrice;
    }

    public static function applyVoucher(float $totalPrice, string $voucherType, int $voucherAmount) {
        if ($voucherType == 'direct') {
            $discountPrice = $voucherAmount;

            $finalPrice = $totalPrice - $discountPrice;

            return [$discountPrice, $finalPrice];
        }

        $discountPrice = $totalPrice * $voucherAmount / 100;

        $finalPrice = $totalPrice - $discountPrice;

        return [$discountPrice, $finalPrice];
    }
}
