<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->access_level > 0);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['nullable', 'string', 'max:128'],
            'about' => ['nullable', 'string', 'max:8192'],
            'type' => ['nullable', 'numeric', 'max:4'],
            'representative_id' => ['nullable', 'numeric']
        ];
    }
}
