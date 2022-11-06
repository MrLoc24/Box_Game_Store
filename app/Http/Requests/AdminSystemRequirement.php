<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSystemRequirement extends FormRequest
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
            'os' => 'required|bail|in:window,mac,linux,ps,xbox',
            'version' => 'required',
            'chipset' => 'required',
            'ram' => 'required',
            'vga' => 'required',
            'storage' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'os.required' => 'OS is required',
            'os.in' => 'OS must be window, mac, linux, ps or xbox',
            'version.required' => 'Version is required',
            'chipset.required' => 'Processor is required',
            'ram.required' => 'RAM is required',
            'vga.required' => 'VGA is required',
            'storage.required' => 'Storage is required',
        ];
    }
}