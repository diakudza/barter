<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['sometime', 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'],
            'password' => ['required', 'min:6', 'confirmed'],
        ];
    }
}
