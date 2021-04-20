<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UniqueUsername implements Rule
{
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
        $user = User::where('username', $value)->first();

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
        return 'The validation error message.';
    }
}
