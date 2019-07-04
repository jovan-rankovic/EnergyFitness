<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'url' => 'required|url',
            'icon' => 'required|min:2',
            'trainer_id' => 'nullable|numeric'
        ];
    }
}