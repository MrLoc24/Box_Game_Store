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
            // 'picture'=> 'required|bail',
        ];
    }
    public function messages()
    {
        return [
            'loginName.required' => '* Login naame cannot blank',
            'adminName.required' => '* Display name cannot blank',
            'adminEmail.required' => '* Email cannot blank',
        ];
    }
}