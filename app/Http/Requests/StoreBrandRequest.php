<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255|unique:brands,name',
            'logo'      => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ];
    }
}
