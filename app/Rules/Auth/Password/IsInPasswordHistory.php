<?php

namespace App\Rules\Auth\Password;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class IsInPasswordHistory implements Rule, DataAwareRule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Validation error message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new rule instance.
     *
     * @param  string  $history
     *
     * @return void
     */
    public function __construct($history)
    {
        $this->history = $history;
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
        $this->history->each(function ($entry) use ($value) {
            if (Hash::check($value, $entry->password)) {
                $this->message = trans('passwords.history');

                return false;
            }
        });

        if (isset($this->data['current_password'])) {
            $this->message = trans('passwords.same');

            return (\strcmp($this->data['current_password'], $value) !== 0);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
