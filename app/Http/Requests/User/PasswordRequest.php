<?php

namespace App\Http\Requests\User;

use App\Models\User;
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
                'min:' . User::PASSWORD_MIN_LENGTH,
                'confirmed',
            ]
        ];
    }
}
