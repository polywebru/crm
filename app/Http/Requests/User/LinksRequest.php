<?php

namespace App\Http\Requests\User;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LinksRequest extends FormRequest
{
    public function rules()
    {
        return [
            'links' => [
                'nullable',
                'array',
            ],
            'links.*.type' => [
                'required',
                'string',
                Rule::in(array_flip(Link::TYPES))
            ],
            'links.*.url' => [
                'required',
                'string',
                'max:255',
            ]
        ];
    }
}
