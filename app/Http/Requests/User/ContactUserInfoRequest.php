<?php

namespace App\Http\Requests\User;

use App\Rules\UniqueEmail;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;

class ContactUserInfoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email', new UniqueEmail()],
            'phone' => ['required', 'string', 'phone:RU', new UniquePhone()],
        ];
    }
}
