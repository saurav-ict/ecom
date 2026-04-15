<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'sku', 'slug', 'description', 'price',
        'stock', 'is_active', 'brand_id', 'image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function propertyOptions()
    {
        return $this->belongsToMany(PropertyOption::class, 'product_property_option');
    }
}
