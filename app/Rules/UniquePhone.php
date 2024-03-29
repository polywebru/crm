<?php

namespace App\Rules;

use App\Models\User;
use App\Traits\HasPhone;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::user() && $user) {
            return Auth::user()->id === $user->id;
        } else {
            return ($user) ? false : true;
        }
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
