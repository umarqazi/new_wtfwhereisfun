<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizer extends FormRequest
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
            'name'              =>  'sometimes|required|string|max:35',
            'descprition'       =>  'sometimes|required',
            'email'             =>  'sometimes|required|email',
            'location'          =>  'sometimes|required|string',
            'contact'           =>  'sometimes|required',
            'website'           =>  'sometimes|required|url',
            'backgroud_color'   =>  'sometimes|required|string',
            'text_color'        =>  'sometimes|required|string'
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
            'website.url'        => 'Website url must starts from http:// or https://'
        ];
    }
}
