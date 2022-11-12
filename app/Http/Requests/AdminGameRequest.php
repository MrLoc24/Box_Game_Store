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
            //System Requirement form
            'os.*' => 'required|bail|in:window,mac,linux,ps,xbox',
            'version.*' => 'required',
            'chipset.*' => 'required',
            'ram.*' => 'required',
            'vga.*' => 'required',
            'storage.*' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gameplay.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            // Message for System Requirement form
            'os.*.required' => 'OS is required',
            'os.*.in' => 'OS must be window, mac, linux, ps or xbox',
            'version.*.required' => 'Version is required',
            'chipset.*.required' => 'Processor is required',
            'ram.*.required' => 'RAM is required',
            'vga.*.required' => 'VGA is required',
            'storage.*.required' => 'Storage is required',
            'icon.required' => 'Icon is required',
            'icon.image' => 'Icon must be image',
            'icon.mimes' => 'Icon must be jpeg, png, jpg, gif, svg',
            'icon.max' => 'Icon must be less than 2MB',
            'banner.required' => 'Banner is required',
            'banner.image' => 'Banner must be image',
            'banner.mimes' => 'Banner must be jpeg, png, jpg, gif, svg',
            'banner.max' => 'Banner must be less than 2MB',
            'gameplay.*.required' => 'Gameplay is required',
            'gameplay.*.image' => 'Gameplay must be image',
            'gameplay.*.mimes' => 'Gameplay must be jpeg, png, jpg, gif, svg',
            'gameplay.*.max' => 'Gameplay must be less than 2MB',
        ];
    }
}