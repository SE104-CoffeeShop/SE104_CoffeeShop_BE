<?php

namespace App\Http\Requests;

class StoreProductRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'unit_price' => 'required|integer|min:0',
        ];
    }
}
