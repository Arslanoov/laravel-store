<?php

namespace App\Http\Requests\Shop\Comment;

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
            'parent' => 'nullable|integer',
            'text' => 'required|string|max:500'
        ];
    }
}