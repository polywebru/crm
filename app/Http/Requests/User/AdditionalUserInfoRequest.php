<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdditionalUserInfoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'speciality_id' => ['nullable', 'numeric', 'exists:specialities,id'],
            'study_begin_date' => ['nullable', 'date'],
            'study_duration' => ['nullable', 'string', Rule::in(array_flip(User::STUDY_DURATIONS))],
        ];
    }
}
