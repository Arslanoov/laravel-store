<?php

namespace App\Http\Requests\Admin\User;

use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property User $user
 */
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
            'email' => 'required|string|max:255|unique:users,id,' . $this->user->id,
        ];
    }
}