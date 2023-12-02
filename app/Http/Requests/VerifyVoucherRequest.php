<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyVoucherRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'voucher_code' => 'required|string',
        ];
    }
}
