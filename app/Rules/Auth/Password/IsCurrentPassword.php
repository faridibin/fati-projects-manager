<?php

namespace App\Rules\Auth\Password;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class IsCurrentPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @param  string  $current
     *
     * @return void
     */
    public function __construct($current)
    {
        $this->current = $current;
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
        return Hash::check($value, $this->current);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('passwords.current');
    }
}
