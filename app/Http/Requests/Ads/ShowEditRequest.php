<?php

namespace App\Http\Requests\Ads;

use App\Models\Ad;
use App\Queries\QueryBuilderAds;
use Illuminate\Foundation\Http\FormRequest;

class ShowEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $ad = $this->route('show');
        if(in_array(auth()->user()->getRole(), ['admin', 'developer'])) {
            return true;
        }
        return $ad && $this->user()->can('show', $ad);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fromadmin' => ['sometimes', 'integer'],
        ];
    }
}
