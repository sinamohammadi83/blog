<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
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
            'name' => ['required','min:2'],
            'family' => ['required','min:2'],
            'username' => ['required','min:2'],
            'email' => ['required','email'],
            'image' => ['nullable','max:2048','mimes:jpg,jpeg,svg,png'],
            'role' => ['required','exists:roles,id'],
            'password' => ['required','min:8','max:20','confirmed'],
        ];
    }
}
