<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\PropertyOption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Nike Air Max 270',
                'sku'         => 'NK-AM270-001',
                'description' => 'Lightweight and breathable running shoe with Max Air unit for all-day comfort.',
                'price'       => 149.99,
                'stock'       => 50,
                'brand'       => 'Nike',
                'categories'  => ['Sneakers', 'Running'],
                'color'       => 'Black',
                'size'        => 'L',
                'material'    => 'Nylon',
                'gender'      => 'Men',
            ],
            [
                'name'        => 'Adidas Ultraboost 22',
                'sku'         => 'AD-UB22-002',
                'description' => 'Premium running shoe with Boost midsole for incredible energy return.',
                'price'       => 179.99,
                'stock'       => 35,
                'brand'       => 'Adidas',
                'categories'  => ['Sneakers', 'Running'],
                'color'       => 'White',
                'size'        => 'M',
                'material'    => 'Polyester',
                'gender'      => 'Unisex',
            ],
            [
                'name'        => 'Puma Classic Leather Jacket',
                'sku'         => 'PM-LJ-003',
                'description' => 'Stylish leather jacket with modern fit and premium finish.',
                'price'       => 229.99,
                'stock'       => 20,
                'brand'       => 'Puma',
                'categories'  => ['Jackets'],
                'color'       => 'Black',
                'size'        => 'XL',
                'material'    => 'Leather',
                'gender'      => 'Men',
            ],
            [
                'name'        => 'Nike Dri-FIT T-Shirt',
                'sku'         => 'NK-DFT-004',
                'description' => 'Moisture-wicking fabric keeps you dry and comfortable during workouts.',
                'price'       => 34.99,
                'stock'       => 100,
                'brand'       => 'Nike',
                'categories'  => ['T-Shirts', 'Gym & Fitness'],
                'color'       => 'Blue',
                'size'        => 'M',
                'material'    => 'Polyester',
                'gender'      => 'Men',
            ],
            [
                'name'        => 'Adidas Tiro Track Pants',
                'sku'         => 'AD-TTP-005',
                'description' => 'Classic track pants with tapered fit and iconic 3-stripe design.',
                'price'       => 54.99,
                'stock'       => 60,
                'brand'       => 'Adidas',
                'categories'  => ['Gym & Fitness'],
                'color'       => 'Navy',
                'size'        => 'L',
                'material'    => 'Polyester',
                'gender'      => 'Men',
            ],
            [
                'name'        => 'Reebok Classic Sneakers',
                'sku'         => 'RB-CS-006',
                'description' => 'Timeless design with soft leather upper and cushioned sole.',
                'price'       => 89.99,
                'stock'       => 45,
                'brand'       => 'Reebok',
                'categories'  => ['Sneakers'],
                'color'       => 'White',
                'size'        => 'M',
                'material'    => 'Leather',
                'gender'      => 'Unisex',
            ],
            [
                'name'        => 'Under Armour Sports Bag',
                'sku'         => 'UA-SB-007',
                'description' => 'Durable sports bag with multiple compartments and water-resistant coating.',
                'price'       => 69.99,
                'stock'       => 30,
                'brand'       => 'Under Armour',
                'categories'  => ['Bags'],
                'color'       => 'Black',
                'size'        => 'XL',
                'material'    => 'Nylon',
                'gender'      => 'Unisex',
            ],
            [
                'name'        => 'Converse Chuck Taylor All Star',
                'sku'         => 'CV-CT-008',
                'description' => 'Iconic canvas sneaker with rubber sole and classic high-top silhouette.',
                'price'       => 64.99,
                'stock'       => 80,
                'brand'       => 'Converse',
                'categories'  => ['Sneakers'],
                'color'       => 'Red',
                'size'        => 'S',
                'material'    => 'Cotton',
                'gender'      => 'Unisex',
            ],
            [
                'name'        => 'Vans Old Skool',
                'sku'         => 'VN-OS-009',
                'description' => 'Classic skate shoe with suede and canvas upper and signature side stripe.',
                'price'       => 74.99,
                'stock'       => 55,
                'brand'       => 'Vans',
                'categories'  => ['Sneakers'],
                'color'       => 'Black',
                'size'        => 'M',
                'material'    => 'Leather',
                'gender'      => 'Unisex',
            ],
            [
                'name'        => 'New Balance 574 Core',
                'sku'         => 'NB-574-010',
                'description' => 'Heritage running shoe with ENCAP midsole technology for superior comfort.',
                'price'       => 99.99,
                'stock'       => 40,
                'brand'       => 'New Balance',
                'categories'  => ['Sneakers', 'Running'],
                'color'       => 'Grey',
                'size'        => 'L',
                'material'    => 'Nylon',
                'gender'      => 'Men',
            ],
            [
                'name'        => 'Nike Women\'s Dress',
                'sku'         => 'NK-WD-011',
                'description' => 'Elegant athletic dress with stretch fabric for maximum movement.',
                'price'       => 79.99,
                'stock'       => 25,
                'brand'       => 'Nike',
                'categories'  => ['Dresses'],
                'color'       => 'Pink',
                'size'        => 'S',
                'material'    => 'Polyester',
                'gender'      => 'Women',
            ],
            [
                'name'        => 'Adidas Kids Running Shoes',
                'sku'         => 'AD-KRS-012',
                'description' => 'Lightweight kids shoe with cushioned sole for active play.',
                'price'       => 49.99,
                'stock'       => 70,
                'brand'       => 'Adidas',
                'categories'  => ['School Shoes'],
                'color'       => 'Blue',
                'size'        => 'S',
                'material'    => 'Nylon',
                'gender'      => 'Kids',
            ],
        ];

        foreach ($products as $data) {
            $brand = Brand::where('name', $data['brand'])->first();

            // Unique slug
            $slug     = Str::slug($data['name']);
            $original = $slug;
            $i        = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $original . '-' . $i++;
            }

            // Dummy Image Logic
            $imageName = 'products/' . $slug . '.png';
            if (!\Illuminate\Support\Facades\Storage::disk('public')->exists('products')) {
                \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('products');
            }
            if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($imageName)) {
                $bg = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                $imageUrl = "https://placehold.co/400x400/{$bg}/FFFFFF.png?text=" . urlencode($data['name']);
                $imageContent = @file_get_contents($imageUrl);
                if ($imageContent) {
                    \Illuminate\Support\Facades\Storage::disk('public')->put($imageName, $imageContent);
                }
            }

            $product = Product::updateOrCreate(
                ['sku' => $data['sku']],
                [
                    'name'        => $data['name'],
                    'slug'        => $slug,
                    'description' => $data['description'],
                    'price'       => $data['price'],
                    'stock'       => $data['stock'],
                    'brand_id'    => $brand?->id,
                    'is_active'   => true,
                    'image'       => $imageName,
                ]
            );

            // Sync categories
            $categoryIds = Category::whereIn('name', $data['categories'])->pluck('id')->toArray();
            $product->categories()->sync($categoryIds);

            // Sync one option per property
            $optionIds = [];
            foreach (['color' => 'Color', 'size' => 'Size', 'material' => 'Material', 'gender' => 'Gender'] as $key => $propertyName) {
                if (!empty($data[$key])) {
                    $option = PropertyOption::whereHas('property', fn($q) => $q->where('name', $propertyName))
                        ->where('name', $data[$key])
                        ->first();
                    if ($option) $optionIds[] = $option->id;
                }
            }
            $product->propertyOptions()->sync($optionIds);
        }
    }
}
