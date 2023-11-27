<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutInvoiceRequest;
use App\Models\Product;

class InvoiceCheckoutController extends Controller
{
    public function __invoke(CheckoutInvoiceRequest $request) {
        $cart = $request->input('cart');

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

        return response($totalPrice, 200);
    }
}
