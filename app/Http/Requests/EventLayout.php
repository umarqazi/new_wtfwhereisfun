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
        return [
            'event_layout'      => 'required|integer',
            'header_image'      => 'required|image|dimensions:min_width=1600,min_height=900',
            'gallery_medium'    => 'required|image|dimensions:min_width=600,min_height=600',
        ];
    }
}
