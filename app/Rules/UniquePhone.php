<?php

namespace App\Rules;

use App\Models\User;
use App\Traits\HasPhone;
use Illuminate\Contracts\Validation\Rule;

class UniquePhone implements Rule
{
    use HasPhone;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $phone = $this->preparePhone($value);
        $user = User::where('phone', $phone)->first();

        return ($user) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Пользователь с таким телефоном уже зарегистрирован.';
    }
}
