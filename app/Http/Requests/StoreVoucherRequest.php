<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreVoucherRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'voucher_code' => 'required|string|unique:voucher',
            'type' => ['required', 'string', Rule::in(['direct', 'percent'])],
            'amount' => 'required|integer',
            'quantity' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];
    }
}
