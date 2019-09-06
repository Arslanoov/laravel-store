<?php

namespace App\Http\Requests\Admin\Shop\Product\Product;

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
            'category' => 'nullable|integer',
            'brand' => 'required|integer',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:shop_products',
            'price' => 'required|integer',
            'text' => 'required|string'
        ];
    }
}