<?php

namespace App\Http\Requests;

class StoreProductRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable',
            'unit_price' => 'required|integer|min:0',
        ];
    }
}
