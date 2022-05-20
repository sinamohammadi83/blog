<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class NameRgisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','min:2'],
            'family' => ['required','min:2']
        ];
    }
}
