<?php

namespace App\Http\Requests\Ads;

use App\Models\Ad;
use App\Queries\QueryBuilderAds;
use Illuminate\Foundation\Http\FormRequest;

class SearchAdRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'nullable'],
            'barter_type' => ['sometimes', 'in:free,barter', 'nullable'],
            'category' => ['sometimes', 'integer', 'exists:categories,id', 'nullable'],
            'city' => ['sometimes', 'integer', 'exists:cities,id', 'nullable'],
            'status' => ['sometimes'],
            'barter_for' => ['sometimes'],
            'resultCount' => ['sometimes', 'integer', 'min:1', 'max:200']
        ];
    }
}
