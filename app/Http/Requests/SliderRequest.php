<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'position' => 'required|numeric|unique:sliders',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2000'
        ];
    }
}
