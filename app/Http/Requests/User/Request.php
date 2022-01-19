<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        if ($this->isMethod('PATCH')) {
            $rules =  [
                'first_name' => 'filled|string|max:255',
                'last_name' => 'filled|string|max:255',
                'email' => ['filled', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
                'location' => 'filled|',
                'bio' => 'filled|',
            ];
        }

        return $rules;
    }
}
