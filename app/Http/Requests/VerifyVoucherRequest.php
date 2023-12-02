<?php

namespace App\Http\Requests;

class VerifyVoucherRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'voucher_code' => 'required|string',
        ];
    }
}
