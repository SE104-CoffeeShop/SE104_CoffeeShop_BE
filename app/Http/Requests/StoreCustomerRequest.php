<?php

namespace App\Http\Requests;

class StoreCustomerRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'phone_number' => 'required|string',
        ];
    }
}
