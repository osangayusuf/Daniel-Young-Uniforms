<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'sub_category' => ['required', 'string', 'max:255'],
            'add_new_sub_category' => ['required_if:sub_category,"add_new_sub_category"', 'nullable', 'string', 'max:255'],
            'classification' => ['nullable', 'string', 'max:255'],
            'availability' => ['boolean'],
            'colours' => ['required'],
            'sizes' => ['required'],
            'description' => ['required', 'string', 'max:500'],
            'image1' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'image2' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'image3' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'image4' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function authorize(): bool
    {
        return (Auth::check() && Auth::user()->usertype == 'admin');
    }
}
