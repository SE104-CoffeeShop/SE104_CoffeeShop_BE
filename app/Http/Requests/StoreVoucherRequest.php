<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVoucherRequest extends FormRequest
{
    public function rules()
    {
        return [
            'voucher_code' => 'required|string',
            'type' => 'required|string', Rule::in(['direct', 'percent']),
            'amount' => 'required|numeric',
            'quantity' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];
    }
}
