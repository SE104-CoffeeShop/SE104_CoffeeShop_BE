<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'phone_number' => 'required|string'
        ];
    }
}
