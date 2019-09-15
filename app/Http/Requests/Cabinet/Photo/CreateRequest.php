<?php

namespace App\Http\Requests\Cabinet\Photo;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}