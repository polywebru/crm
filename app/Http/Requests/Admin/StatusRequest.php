<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status' => [
                'required',
                'string',
                Rule::in(array_flip(User::STATUSES)),
            ],
        ];
    }
}
