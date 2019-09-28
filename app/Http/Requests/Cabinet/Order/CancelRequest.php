<?php

namespace App\Http\Requests\Cabinet\Order;

use Illuminate\Foundation\Http\FormRequest;

class CancelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reason' => 'required|string|max:500'
        ];
    }
}