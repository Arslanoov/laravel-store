<?php

namespace App\Http\Requests\Admin\Shop\Product\Photo;

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
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }
}