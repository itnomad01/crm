<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRepresentativeRequest extends FormRequest
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
            'family' => ['nullable', 'string', 'max:256'],
            'name' => ['nullable', 'string', 'max:256'],
            'ibn' => ['nullable', 'string', 'max:256'],
            'role' => ['nullable', 'string', 'max:256'],
            'email' => ['nullable', 'email', 'max:255'],
            'tel' => ['nullable', 'string', 'max:10']
        ];
    }
}
