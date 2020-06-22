<?php

namespace App\Http\Requests\Admin\Shop\Brand;

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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:shop_brands',
            'description' => 'nullable|string'
        ];
    }
}