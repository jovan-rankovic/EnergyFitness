<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email|unique:users',
            'email_verified_at' => 'date_format:Y-m-d H:i:s',
            'role_id' => 'required|numeric',
            'image' => 'image|max:2000|dimensions:ratio=1/1',
            'password' => [
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'first_name.alpha' => 'First name must contain only letters.',
            'first_name.min' => 'First name must contain at least 2 letters.',
            'first_name.max' => 'First name can contain maximum 20 letters.',
            'last_name.alpha' => 'Last name must contain only letters.',
            'last_name.min' => 'Last name must contain at least 2 letters.',
            'last_name.max' => 'Last name can contain maximum 20 letters.',
            'email.email' => 'Invalid e-mail format.',
            'email.unique:users' => 'This e-mail already exists.',
            'password.min' => 'Password must contain at least 6 characters',
            'password.regex' => 'Password must contain one uppercase letter and one number.',
            'role_id.required' => 'A role must be selected.'
        ];
    }
}
