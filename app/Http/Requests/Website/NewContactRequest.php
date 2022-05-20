<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class NewContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','min:2'],
            'email' => ['required','email','min:2'],
            'subject' => ['required','min:2'],
            'content' => ['required','min:2'],
        ];
    }
}
