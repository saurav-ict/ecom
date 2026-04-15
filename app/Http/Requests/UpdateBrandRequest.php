<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255', Rule::unique('brands', 'name')->ignore($this->route('brand')?->id)],
            'logo'      => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ];
    }
}
