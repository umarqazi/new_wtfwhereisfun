<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Domain extends FormRequest
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
        if(isset($this->domain_id)){
            $domainRule = 'required|string|max:75|unique:domains,domain,'.decrypt_id($this->domain_id);
        }else{
            $domainRule = 'required|string|max:75|unique:domains,domain';
        }
        return [
            'domain'    => $domainRule
        ];
    }
}
