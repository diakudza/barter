<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'oldPassword' => ['required', 'current_password'],
            'newPassword' => ['required', 'string', 'same:confirmNewPassword'],
            'confirmNewPassword' => ['required', 'string', 'different:oldPassword'],
            'id' => ['required', 'integer', 'exists:users,id']
        ];
    }
}
