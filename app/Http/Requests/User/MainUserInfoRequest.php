<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MainUserInfoRequest extends FormRequest
{
    private const VARCHAR_MAX_LENGTH = 255;

    public function rules()
    {
        return [
            'username' => ['required', 'string', 'unique:users'],
            'last_name' => ['required', 'string', 'max:' . self::VARCHAR_MAX_LENGTH],
            'first_name' => ['required', 'string', 'max:' . self::VARCHAR_MAX_LENGTH],
            'middle_name' => ['nullable', 'string', 'max:' . self::VARCHAR_MAX_LENGTH],
            'gender' => ['nullable', 'string', Rule::in(['male', 'female'])],
            'date_birth' => ['nullable', 'date', 'date_format:Y-m-d'],
        ];
    }
}
