<?php

namespace App\Http\Requests\Shop\Review;

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
            'rating' => 'required|integer|max:5|min:1',
            'text' => 'required|string|max:500'
        ];
    }
}