<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventLayout extends FormRequest
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

        $rules['event_layout']  =  'required|integer';

        if(empty($this->input('header_image_exist'))){
            $rules['header_image']  =  'required|image|dimensions:min_width=1600,min_height=700';
        }else{
            $rules['header_image']  =  'image|dimensions:min_width=1600,min_height=700';
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
            'event_layout.required'     => 'Please select an Event Layout',
            'header_image.required'     => 'Please upload Event Main Image',
        ];
    }
}
