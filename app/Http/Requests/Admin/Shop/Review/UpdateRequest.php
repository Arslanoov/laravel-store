<?php

namespace App\Http\Requests\Admin\Shop\Review;

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
            'rating' => 'integer|max:1',
            'text' => 'string'
        ];
    }
}