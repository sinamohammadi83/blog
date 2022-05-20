<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class NewCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','unique:categories,title'],
            'category' => ['nullable','exists:categories,id']
        ];
    }
}
