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
            'website'           =>  'sometimes|required|url',
            'organizer_url'     =>  'sometimes|required|string',
            'backgroud_color'   =>  'sometimes|required|string',
            'text_color'        =>  'sometimes|required|string'
        ];
    }
}
