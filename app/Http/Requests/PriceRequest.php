<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'amount' => 'required|numeric'
        ];
    }
}
