<?php

namespace App\Http\Requests\Ads;

use App\Models\Ad;
use App\Queries\QueryBuilderAds;
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
        $ad = $this->route('ad');
        if(in_array(auth()->user()->getRole(), ['admin', 'developer'])) {
            return $ad;
        }
        return $ad && $this->user()->can('update', $ad);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'text' => ['required', 'string', 'min:3'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'barter_type' => ['required', 'in:free,barter'],
            'status_id' => ['sometimes', 'integer', 'exists:ad_statuses,id'],
            'image' => ['image'],
            'imageMain' => ['integer', 'exists:images,id'],
            'fromAdmin' => ['sometimes', 'integer']
            'removeImage' => ['array'],
            'barter_title' => [
                'required_if:barter_type,barter',
                'prohibited_if:barter_type,free',
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
            'barter_text' => [
                'required_if:barter_type,barter',
                'prohibited_if:barter_type,free',
                'string',
                'min:3',
                'nullable',
            ],
            'barter_category_id' => [
                'required_if:barter_type,barter',
                'prohibited_if:barter_type,free',
                'integer',
                'exists:categories,id',
                'nullable',
            ],
        ];
    }
}
