<?php

namespace App\Http\Requests\Cabinet\Profile;

use Illuminate\Foundation\Http\FormRequest;

class FillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'phone' => 'nullable|digits_between:9,12',
            'code' => 'nullable|integer|min:0'
        ];
    }
}