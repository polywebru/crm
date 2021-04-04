<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'avatar' => ['required', 'file', 'mimes:jpg,png'],
        ];
    }
}
