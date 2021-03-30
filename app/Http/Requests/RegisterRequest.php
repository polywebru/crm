<?php

namespace App\Http\Requests;

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
                'unique:users',
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
                'min:5',
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
            ],
        ];
    }
}
