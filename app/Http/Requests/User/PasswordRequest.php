<?php

namespace App\Http\Requests\User;

use App\Rules\ValidOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'old_password' => [
                'required',
                'string',
                new ValidOldPassword(),
            ],
            'password' => [
                'required',
                'string',
                'min:5',
                'confirmed',
            ]
        ];
    }
}
