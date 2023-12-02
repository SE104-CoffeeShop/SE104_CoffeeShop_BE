<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:55',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->symbols(),
            ],
        ];
    }
}
