<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required|min:2',
            'post_id' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.requred' => 'Can\'t post an empty comment.',
            'content.min' => 'Comment must contain at least 2 characters.'
        ];
    }
}
