<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'id' => ['required', 'integer', 'exists:users,id'],
            'phone' => [
                'nullable',
                'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',
                'min:10',
                'max:35',
                \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)
            ],
            'image' => ['image'],
            'removeImage' => ['nullable', 'integer', 'exists:images,id']
        ];
    }
}
