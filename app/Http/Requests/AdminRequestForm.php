<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestForm extends FormRequest
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
            'loginName' => 'required|bail',
            'adminEmail' => 'required|bail',
            'adminName' => 'required|bail',
            'adminPassword' => 'required|bail|min:4',
            // 'picture'=> 'required|bail',
        ];
    }
    public function messages()
    {
        return [
            'loginName.required' => '* Product Name cannot blank',
            // 'txtname.unique'=> '* Product Name must be unique !',
            'adminName.required' => '* Manufacturer cannot blank',
            'adminEmail.required' => '* Sale Price must be numeric',
            // 'picture.required'=> '* Product picture cannot blank',
            'adminPassword.required' => '* Password cannot blank',
        ];
    }
}