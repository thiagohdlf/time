<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:100',
            'email' => 'sometimes|required|min:6|max:150',
            'password' => 'nullable|confirmed|min:6|max:24',
        ];

        if($this->method() === 'POST'){
            $rules['email'] .= '|unique:users,email,';
            $rules['password'] .= '|required';
        }

        return $rules;
    }
}
