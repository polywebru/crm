<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => [
                'required',
            ],
            'password' => [
                'required',
                'min:' . User::PASSWORD_MIN_LENGTH,
                'confirmed',
            ],
        ];
    }
}
