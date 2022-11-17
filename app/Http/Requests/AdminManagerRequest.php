<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminManagerRequest extends FormRequest
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
            'adminId' => 'required|bail',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'numeric',
            'role' => 'required|in:manager,employee',
        ];
    }
    public function messages()
    {
        return [
            'adminId.required' => '* Login name cannot blank',
            'name.required' => '* Display name cannot blank',
            'email.required' => '* Email cannot blank',
            'password.required' => '* Password cannot blank',
            'phone.numeric' => '* Phone must be number',
            'role.required' => '* Role cannot blank',
            'role.in' => '* Role must be manager or employee',
        ];
    }
}