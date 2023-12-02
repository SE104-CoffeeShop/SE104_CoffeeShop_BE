<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutInvoiceRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|integer|exists:product,id',
            'cart.*.quantity' => 'required|integer',
            'voucher_code' => 'nullable|string',
            'customer_phone_number' => 'nullable|string',
            'table_number' => 'required|integer',
        ];
    }
}
