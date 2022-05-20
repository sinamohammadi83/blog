<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required'],
            'image' => ['nullable','max:2048'],
            'content' => ['required'],
            'category' => ['nullable','exists:categories,id'],
            'comment' => ['nullable'],
            'published' => ['nullable']
        ];
    }
}
