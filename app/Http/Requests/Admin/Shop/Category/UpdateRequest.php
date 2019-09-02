<?php

namespace App\Http\Requests\Admin\Shop\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'parent' => 'nullable|integer|exists:shop_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:shop_categories,id,' . $this->category->id,
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ];
    }
}