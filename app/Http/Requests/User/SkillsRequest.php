<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SkillsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'skills' => ['required', 'array'],
            'skills.*.name' => ['nullable', 'string'],
        ];
    }
}
