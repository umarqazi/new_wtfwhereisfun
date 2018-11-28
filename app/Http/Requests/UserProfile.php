<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfile extends FormRequest
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
            'first_name'        =>  'required|string|max:35',
            'last_name'         =>  'required|string|max:35',
            'prefix'            =>  'required',
            'job_title'         =>  'string',
            'company'           =>  'string'
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
            'first_name.regex'  => 'First Name should only consists of Alphabetics',
            'last_name.regex'   => 'First Name should only consists of Alphabetics',
            'company.regex'     => 'Company should only consists alphabets numbers and spaces'
        ];
    }
}
