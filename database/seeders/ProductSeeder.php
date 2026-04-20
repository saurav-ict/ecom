<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\PropertyOption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $brands = Brand::pluck('id')->toArray();
        $categories = Category::all();
        $propertyOptions = PropertyOption::with('property')->get();

        $techAdjectives = ['Pro', 'Max', 'Ultra', 'Plus', 'Lite', 'X', 'Elite', 'Premium', 'Smart', 'Wireless'];
        $techNouns = ['Smartphone', 'Laptop', 'Tablet', 'Headphones', 'Smartwatch', 'Monitor', 'Camera', 'Speaker'];
        
        $fashionAdjectives = ['Classic', 'Modern', 'Casual', 'Formal', 'Vintage', 'Slim Fit', 'Comfort', 'Sport'];
        $fashionNouns = ['T-Shirt', 'Jeans', 'Jacket', 'Sneakers', 'Dress', 'Sweater', 'Hoodie', 'Shorts'];

        $totalProducts = 60;

        for ($i = 1; $i <= $totalProducts; $i++) {
            $isTech = $faker->boolean(60); // 60% chance of being tech

            if ($isTech) {
                $name = $faker->randomElement($techAdjectives) . ' ' . $faker->randomElement($techNouns) . ' ' . $faker->numberBetween(10, 99);
                $price = $faker->randomFloat(2, 5000, 150000);
            } else {
                $name = $faker->randomElement($fashionAdjectives) . ' ' . $faker->randomElement($fashionNouns) . ' ' . $faker->word();
                $price = $faker->randomFloat(2, 500, 5000);
            }

            // Ensure unique slug
            $slug = Str::slug($name) . '-' . Str::random(5);

            $product = Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => ucwords($name),
                    'description' => $faker->paragraph(2),
                    'price' => $price,
                    'stock' => $faker->numberBetween(0, 150),
                    'is_active' => true,
                    'brand_id' => $faker->randomElement($brands),
                    'image' => "https://picsum.photos/seed/product{$i}/300/300",
                    'sku' => 'SKU-' . strtoupper(Str::random(6)),
                ]
            );

            // Assign Categories
            if ($categories->isNotEmpty()) {
                $product->categories()->sync($categories->random(rand(1, 2))->pluck('id'));
            }

            // Assign Properties based on type
            if ($propertyOptions->isNotEmpty()) {
                if ($isTech) {
                    // Assign storage
                    $storageOptions = $propertyOptions->filter(fn($po) => $po->property->name === 'Storage');
                    if ($storageOptions->isNotEmpty()) {
                        $product->propertyOptions()->attach($storageOptions->random()->id);
                    }
                    // Assign Color
                    $colorOptions = $propertyOptions->filter(fn($po) => $po->property->name === 'Color');
                    if ($colorOptions->isNotEmpty()) {
                        $product->propertyOptions()->attach($colorOptions->random()->id);
                    }
                } else {
                    // Assign Size
                    $sizeOptions = $propertyOptions->filter(fn($po) => $po->property->name === 'Size');
                    if ($sizeOptions->isNotEmpty()) {
                        $product->propertyOptions()->attach($sizeOptions->random()->id);
                    }
                    // Assign Color
                    $colorOptions = $propertyOptions->filter(fn($po) => $po->property->name === 'Color');
                    if ($colorOptions->isNotEmpty()) {
                        $product->propertyOptions()->attach($colorOptions->random()->id);
                    }
                }
            }
        }
    }
}
