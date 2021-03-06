<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            'first_name'    => 'sometimes|required|string|max:255',
            'last_name'     => 'sometimes|required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'username'      => 'sometimes|required',
            'password'      => 'required|string|max:14|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.regex' => 'Password must contain at least 6 characters, including UPPER/lower case & numbers, at-least one special character',
        ];
    }
}
