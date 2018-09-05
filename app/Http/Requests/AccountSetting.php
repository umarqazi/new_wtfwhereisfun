<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountSetting extends FormRequest
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

            'phone'             =>  'required|min:10|max:15|numeric',
            'mobile'            =>  'required|min:10|max:15|numeric',
            'shipping_address'  =>  'required|alpha_dash',
            'shipping_country'  =>  'required',
            'shipping_state'    =>  'required',
            'shipping_city'     =>  'required',
            'billing_address'   =>  'sometimes|alpha_dash',
            'billing_country'   =>  'sometimes',
            'billing_state'     =>  'sometimes',
            'billing_city'      =>  'sometimes',
            'gender'            =>  'required|in:other,male,female',
            'birth_month'       =>  'required',
            'birth_date'        =>  'required',
            'birth_year'        =>  'required',
            'age'               =>  'required',
            'website'           =>  'url'
        ];
    }
}
