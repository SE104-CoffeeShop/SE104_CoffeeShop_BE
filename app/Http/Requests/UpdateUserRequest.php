<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:55',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => [
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->symbols(),
            ],
        ];
    }
}
