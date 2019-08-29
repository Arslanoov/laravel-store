<?php

namespace App\Http\Requests\Admin\Blog\Post\Comment;

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
            'parentId' => 'nullable|integer|max:10',
            'text' => 'required|string|max:500'
        ];
    }
}