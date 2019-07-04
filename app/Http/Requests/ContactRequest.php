<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'conName' => 'required|alpha',
            'conEmail' => 'required|email',
            'conSubject' => 'required|min:3',
            'conMsg' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'conName.required' => 'Name is required.',
            'conName.alpha' => 'Name can\'t contain numbers.',
            'conEmail.required' => 'E-mail is required.',
            'conEmail.email' => 'Wrong e-mail format.',
            'conSubject.required' => 'Subject is required.',
            'conSubject.min' => 'Subject must have at least 3 characters.',
            'conMsg.required' => 'Message is required.',
            'conMsg.min' => 'Message must have at least 3 characters.',
        ];
    }
}
