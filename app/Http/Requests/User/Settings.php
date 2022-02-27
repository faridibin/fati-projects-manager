<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Settings extends FormRequest
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
        return [
            'activity' => 'filled', 'array',
            'activity.*' => 'boolean',
            'service' => 'filled|array',
            'service.*' => 'boolean',
        ];
    }
}
