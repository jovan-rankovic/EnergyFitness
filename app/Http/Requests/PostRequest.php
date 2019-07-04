<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|alpha_num|min:3|max:100',
            'contentP' => 'required',
            'user_id' => 'numeric',
            'image' => 'required|image|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'contentP.required' => 'Content is required.'
        ];
    }
}
