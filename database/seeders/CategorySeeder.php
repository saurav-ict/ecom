<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Fashion & Apparel',
            'Home & Kitchen',
            'Beauty & Personal Care',
            'Sports & Outdoors',
            'Books & Stationery',
            'Toys & Games',
            'Automotive',
            'Health & Wellness',
            'Groceries & Gourmet'
        ];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'is_active' => true,
                    'parent_id' => null
                ]
            );
        }
    }
}
