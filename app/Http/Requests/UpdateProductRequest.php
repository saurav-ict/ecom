<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:255', Rule::unique('products', 'name')->ignore($this->route('product')?->id)],
            'sku'           => ['nullable', 'string', 'max:100', Rule::unique('products', 'sku')->ignore($this->route('product')?->id)],
            'description'   => 'nullable|string',
            'price'         => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'brand_id'      => 'nullable|exists:brands,id',
            'categories'    => 'nullable|array',
            'categories.*'  => 'exists:categories,id',
            'properties'    => 'nullable|array',
            'properties.*'  => 'exists:property_options,id',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'is_active'     => 'nullable|boolean',
        ];
    }
}
