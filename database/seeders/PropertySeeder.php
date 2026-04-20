<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            'Size' => ['S', 'M', 'L', 'XL'],
            'Color' => ['Black', 'White', 'Blue', 'Red'],
            'Storage' => ['64GB', '128GB', '256GB']
        ];

        foreach ($properties as $propName => $options) {
            $property = Property::updateOrCreate(
                ['name' => $propName],
                ['is_active' => true]
            );

            foreach ($options as $optionName) {
                PropertyOption::updateOrCreate(
                    [
                        'property_id' => $property->id,
                        'name' => $optionName
                    ],
                    ['is_active' => true]
                );
            }
        }
    }
}
