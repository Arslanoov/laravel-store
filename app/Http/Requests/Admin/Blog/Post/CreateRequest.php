<?php

namespace App\Http\Requests\Admin\Blog\Post;

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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts',
            'description' => 'required|string',
            'text' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'tagsExisting' => 'array',
            'tagsExisting.*' => 'integer|distinct',
            'tagsNew' => 'nullable|string'
        ];
    }
}