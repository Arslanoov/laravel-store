<?php

namespace App\Http\Requests\Admin\Shop\Brand;

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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:shop_brands,id,' . $this->brand->id,
            'description' => 'nullable|string'
        ];
    }
}