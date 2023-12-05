<?php

namespace App\Http\Requests;

class MultipleDestroyRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'ids' => 'required|array',
        ];
    }
}
