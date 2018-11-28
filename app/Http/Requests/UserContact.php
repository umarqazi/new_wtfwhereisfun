<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserContact extends FormRequest
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
            'website'           =>  'url',
            'phone'             =>  'required|numeric',
            'mobile'            =>  'required|numeric',
            'blog'              =>  'string|max:100'
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
            'website.url'  => 'Website url must starts from http:// or https://',
        ];
    }
}
