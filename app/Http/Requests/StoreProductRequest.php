<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255|unique:products,name',
            'sku'           => 'nullable|string|max:100|unique:products,sku',
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
