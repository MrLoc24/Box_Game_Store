<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategory extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'type.*' => 'required|bail',
            'image.*' => 'required|image|mimes:jpeg, gif, png, jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'type.*.required' => '* Type cannot blank and must be unique',
            'image.*.required' => '* Image cannot blank',
            'image.*.mimes' => '* File must be jpeg, gif, png or jpg',
            'image.*.image' => '* File must be image',
            'image.*.max' => '* Image must be less than 2MB',
        ];
    }
}