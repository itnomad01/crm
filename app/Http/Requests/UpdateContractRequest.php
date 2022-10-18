<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->access_level > 1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number' => ['nullable', 'numeric'],
            'date' => ['nullable', 'date'],
            'begin' => ['nullable', 'date'],
            'end' => ['nullable', 'date'],
            'sum' => ['nullable', 'numeric'],
            'number_billout' => ['nullable', 'numeric'],
            'date_billout' => ['nullable', 'date'],
            'date_billout_payment' => ['nullable', 'date'],
            'number_act' => ['nullable', 'numeric'],
            'date_act' => ['nullable', 'date'],
            'date_act_accept' => ['nullable', 'date'],
            'representative_id' => ['nullable', 'numeric']
        ];
    }
}
