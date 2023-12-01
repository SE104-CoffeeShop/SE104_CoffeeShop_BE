<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable',
            'unit_price' => 'required|numeric',
        ];
    }
}
