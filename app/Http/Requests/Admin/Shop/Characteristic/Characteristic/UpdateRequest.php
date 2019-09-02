<?php

namespace App\Http\Requests\Admin\Shop\Characteristic\Characteristic;

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
            'type' => 'required|string|max:16',
            'required' => 'required|boolean',
            'default' => 'required',
            'sort' => 'required|integer'
        ];
    }
}