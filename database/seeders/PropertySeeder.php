<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            'Color' => ['Black', 'White', 'Red', 'Blue', 'Green', 'Yellow', 'Grey', 'Navy', 'Pink', 'Orange'],
            'Size'  => ['XS', 'S', 'M', 'L', 'XL', 'XXL', '3XL'],
            'Material' => ['Cotton', 'Polyester', 'Leather', 'Wool', 'Denim', 'Nylon', 'Silk'],
            'Gender' => ['Men', 'Women', 'Unisex', 'Kids'],
        ];

        foreach ($properties as $name => $options) {
            $property = Property::updateOrCreate(
                ['name' => $name],
                ['is_active' => true]
            );

            foreach ($options as $optionName) {
                $property->options()->updateOrCreate(
                    ['name' => $optionName],
                    ['is_active' => true]
                );
            }
        }
    }
}
