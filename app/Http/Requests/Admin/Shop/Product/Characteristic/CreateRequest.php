<?php

namespace App\Http\Requests\Admin\Shop\Product\Characteristic;

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
            'characteristic' => 'required|integer'
        ];
    }
}