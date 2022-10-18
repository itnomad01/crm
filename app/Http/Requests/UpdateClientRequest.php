<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'fulltitle' => ['nullable', 'string', 'max:512'],
            'title' => ['nullable', 'string', 'max:128'],
            'brandtitle' => ['nullable', 'string', 'max:128'],
            'type' => ['nullable', 'numeric', 'max:2', 'min:0'],
            'ogrn' => ['nullable', 'string', 'max:15'],
            'inn' => ['nullable', 'string', 'max:12'],
            'kpp' => ['nullable', 'string', 'max:9'],
            'address' => ['nullable', 'string', 'max:255'],
            'fintitle' => ['nullable', 'string', 'max:255'],
            'personal_acc' => ['nullable', 'string', 'max:20'],
            'bank_name' => ['nullable', 'string', 'max:128'],
            'bic' => ['nullable', 'string', 'max:9'],
            'corresp_acc' => ['nullable', 'string', 'max:20'],
            'oktmo' => ['nullable', 'string', 'max:11'],
            'email' => ['nullable', 'email', 'max:255'],
            'site' => ['nullable', 'url', 'max:255'],
            'tel' => ['nullable', 'string', 'max:10'],
            'comment' => ['nullable', 'string', 'max:255']
        ];
    }
}
