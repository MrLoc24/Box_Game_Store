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
            'adminEmail' => 'required|bail|email',
            'adminName' => 'required|bail',
            'adminPicture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'loginName.required' => '* Login name cannot blank',
            'adminName.required' => '* Display name cannot blank',
            'adminEmail.required' => '* Email cannot blank',
            'adminEmail.email' => '* Email is not valid',
            'adminPicture.image' => '* Picture must be image',
            'adminPicture.mimes' => '* Picture must be jpeg,png,jpg,gif,svg',
        ];
    }
}