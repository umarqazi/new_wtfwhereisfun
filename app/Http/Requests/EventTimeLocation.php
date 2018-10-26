<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTimeLocation extends FormRequest
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
            'event_location'            =>          'required|string',
            'latitude'                  =>          'required',
            'longitude'                 =>          'required',
            'event_address'             =>          'required|string',
            'timezone'                  =>          'required',
            'start_date'                =>          'before:end_date|required',
            'end_date'                  =>          'after:start_date|required',
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
            'start_date.before'     => 'Start Date must be smaller than End Date',
            'end_date.after'        => 'End Date must be smaller than Start Date.',
        ];
    }
}
