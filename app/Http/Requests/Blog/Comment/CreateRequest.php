<?php

namespace App\Http\Requests\Blog\Comment;

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
            'text' => 'string|max:500'
        ];
    }
}