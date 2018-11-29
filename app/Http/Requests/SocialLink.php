<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLink extends FormRequest
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
            'instagram'          =>  'url',
            'timbler'            =>  'url',
            'linkedin'           =>  'url',
            'google'             =>  'url',
            'twitter'            =>  'url',
            'facebook'           =>  'url',
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
            'instagram.url'     => 'Instagram url must starts from http:// or https://',
            'timbler.url'       => 'Timbler url must starts from http:// or https://',
            'linkedin.url'      => 'Linkedin url must starts from http:// or https://',
            'google.url'        => 'Google url must starts from http:// or https://',
            'twitter.url'       => 'Twitter url must starts from http:// or https://',
            'facebook.url'      => 'Facebook url must starts from http:// or https://',
        ];
    }
}
