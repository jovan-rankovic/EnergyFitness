<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'regFN' => 'required|alpha|min:2|max:20',
            'regLN' => 'required|alpha|min:2|max:20',
            'email' => 'required|email|unique:users',
            'regPasswd' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'regFN.alpha' => 'First name must contain only letters.',
            'regFN.min' => 'First name must contain at least 2 letters.',
            'regFN.max' => 'First name can contain maximum 20 letters.',
            'regLN.alpha' => 'Last name must contain only letters.',
            'regLN.min' => 'Last name must contain at least 2 letters.',
            'regLN.max' => 'Last name can contain maximum 20 letters.',
            'email.email' => 'Invalid e-mail format.',
            'email.unique:users' => 'This e-mail already exists.',
            'regPasswd.min' => 'Password must contain at least 6 characters',
            'regPasswd.regex' => 'Password must contain one uppercase letter and one number.'
        ];
    }
}
