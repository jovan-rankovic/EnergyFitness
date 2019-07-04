<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|alpha|min:3',
            'workout' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'required|image|max:2000|dimensions:width=474,height=592'
        ];
    }
}
