<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutInvoiceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|numeric',
            'cart.*.quantity' => 'required|numeric',
            'voucher_code' => 'nullable|string'
        ];
    }
}
