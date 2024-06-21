<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => ['required', 'exists:products,id'],
            'colour' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'size' => ['required', 'string'],
            'custom_logo' => ['nullable', 'file', 'image', 'max:2048'],
            'further_info' => ['nullable', 'string', 'max:255']
        ];
    }

    public function authorize(): bool
    {
        return auth()->check();
    }
}
