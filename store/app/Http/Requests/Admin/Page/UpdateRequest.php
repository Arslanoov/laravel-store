<?php

namespace App\Http\Requests\Admin\Page;

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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,id,' . $this->page->id,
            'menu_title' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|max:10',
            'description' => 'nullable|string',
            'text' => 'nullable|string',
        ];
    }
}