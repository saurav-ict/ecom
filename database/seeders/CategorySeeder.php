<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $tree = [
            'Men'       => ['T-Shirts', 'Jeans', 'Jackets', 'Sneakers', 'Formal Shoes'],
            'Women'     => ['Dresses', 'Tops', 'Skirts', 'Heels', 'Sandals'],
            'Kids'      => ['Boys Clothing', 'Girls Clothing', 'School Shoes'],
            'Sports'    => ['Running', 'Football', 'Basketball', 'Gym & Fitness'],
            'Accessories' => ['Bags', 'Watches', 'Sunglasses', 'Caps'],
        ];

        foreach ($tree as $parentName => $children) {
            $parent = Category::updateOrCreate(
                ['slug' => Str::slug($parentName)],
                ['name' => $parentName, 'is_active' => true, 'parent_id' => null]
            );

            foreach ($children as $childName) {
                Category::updateOrCreate(
                    ['slug' => Str::slug($childName)],
                    ['name' => $childName, 'is_active' => true, 'parent_id' => $parent->id]
                );
            }
        }
    }
}
