<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "name"=>"required",
            "phone_number"=>"required",
            "email"=>"required"
        ];
    }

    public function messages(){
        return [
            "name.required"=>__('message.required'),
            "phone_number.required"=>__('message.required'),
            "email.required"=>__('message.required')
        ];
    }
}
