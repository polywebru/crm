<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\UniquePhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    private const VARCHAR_MAX_LENGTH = 255;
    private const PASSWORD_MIN_LENGTH = 5;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
                'min:' . self::PASSWORD_MIN_LENGTH,
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
            ],
            'date_birth' => [
                'nullable',
                'date',
            ],
            'faculty_id' => [
                'nullable',
                'numeric',
                'exists:faculties,id',
            ],
            'speciality_id' => [
                'nullable',
                'required_with:faculty_id',
                'numeric',
                'exists:specialities,id',
            ],
            'study_begin_date' => [
                'nullable',
                'date',
            ],
            'study_duration' => [
                'nullable',
                Rule::in(array_flip(User::STUDY_DURATIONS)),
            ],
            'skills' => [
                'nullable',
                'array',
            ],
            'skills.*.name' => [
                'nullable',
                'string',
                'max:' . self::VARCHAR_MAX_LENGTH,
            ],
            'wishes' => [
                'nullable',
                'string',
            ],
        ];
    }
}
