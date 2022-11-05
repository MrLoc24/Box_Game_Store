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
            // 'picture'=> 'required|bail',
        ];
    }
    public function messages()
    {
        return [
            'loginName.required' => '* Login name cannot blank',
            'adminName.required' => '* Admin name cannot blank',
            'adminEmail.required' => '* Admin email must be numeric',
        ];
    }
}