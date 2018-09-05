<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserOtherInformation extends FormRequest
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
            'gender'            =>  'required|in:other,male,female',
            'birth_month'       =>  'required|in:January,February,March,April,May,June,July,August,September,October,
            November,December',
            'birth_date'        =>  'required|integer',
            'birth_year'        =>  'required|integer',
            'age'               =>  'integer',
        ];
    }
}
