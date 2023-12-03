<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class StoreStaffRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->symbols()
                    ->numbers(),
            ],
        ];
    }
}
