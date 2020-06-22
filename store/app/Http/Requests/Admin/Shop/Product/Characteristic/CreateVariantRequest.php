<?php

namespace App\Http\Requests\Admin\Shop\Product\Characteristic;

use Illuminate\Foundation\Http\FormRequest;

class CreateVariantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'variant' => 'required|integer'
        ];
    }
}