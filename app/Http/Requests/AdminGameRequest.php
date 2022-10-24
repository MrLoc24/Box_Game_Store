<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminGameRequest extends FormRequest
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
            'adminEmail' => 'required|bail|email',
            'adminName' => 'required|bail',
            'adminPassword' => 'required|bail|min:4',
            // 'picture'=> 'required|bail',
        ];
    }
    public function messages()
    {
        return [
            'loginName.required' => '* Lo Name cannot blank',
            'adminName.required' => '* Manufacturer cannot blank',
            'adminEmail.required' => '* Sale Price must be numeric',
            'adminPassword.required' => '* Password cannot blank',
        ];
    }
}