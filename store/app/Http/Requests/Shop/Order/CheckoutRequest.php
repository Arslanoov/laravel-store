<?php

namespace App\Http\Requests\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'region' => 'required|integer',
            'delivery' => 'required|integer',
            'note' => 'nullable|string|max:500',
            'terms' => 'required|accepted'
        ];
    }
}