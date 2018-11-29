<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class Checkout extends FormRequest
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
        $rules = [];

        $rules['user_status']   = 'required';
        $rules['quantity']      = 'required|integer';
        $rules['ticket_id']     = 'required';

        if(!Auth::user()){
            if($this->input('user_status') == 'old'){
                $rules['email'] = 'required|string|email|max:255|exists:users,email';
            }else{
                $rules['email'] = 'required|string|email|max:255|unique:users';
                $rules['password']     = 'required|string|max:14|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/';
            }
        }

        return $rules;
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
