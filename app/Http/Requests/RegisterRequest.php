<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\UniqueEmail;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    private const VARCHAR_MAX_LENGTH = 255;

    public function rules()
    {
        return [
            'username' => [
                'nullable',
                'string',
                'unique:users',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:' . self::VARCHAR_MAX_LENGTH,
                new UniqueEmail(),
            ],
            'phone' => [
                'nullable',
                'string',
                'max:255',
                new UniquePhone(),
            ],
            'password' => [
                'required',
                'string',
                'min:' . User::PASSWORD_MIN_LENGTH,
                'confirmed',
            ],
            'last_name' => [
                'required',
                'string',
                'max:' . self::VARCHAR_MAX_LENGTH,
            ],
            'first_name' => [
                'required',
                'string',
                'max:' . self::VARCHAR_MAX_LENGTH,
            ],
            'middle_name' => [
                'nullable',
                'string',
                'max:' . self::VARCHAR_MAX_LENGTH,
            ],
            'gender' => [
                'nullable',
                'string',
                Rule::in(['male', 'female']),
            ],
            'date_birth' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
            ],
        ];
    }
}
