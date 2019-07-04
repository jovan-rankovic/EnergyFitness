<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'price_id' => 'required|numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'price_id.not_in' => 'You must select a price category.'
        ];
    }
}
