<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'roles' => [
                'required',
                'array',
            ],
            'roles.*' => [
                'required',
                'integer',
                'exists:roles,id',
            ],
            'permissions' => [
                'nullable',
                'array',
            ],
            'permissions.*' => [
                'nullable',
                'integer',
                'exists:permissions,id',
            ],
        ];
    }
}
