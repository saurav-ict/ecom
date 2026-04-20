<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'Nike',
            'Adidas',
            'LG',
            'Dyson',
            'L\'Oreal',
            'Lego',
            'Bosch'
        ];

        foreach ($brands as $index => $name) {
            $id = $index + 1;
            Brand::updateOrCreate(
                ['name' => $name],
                [
                    'logo' => "https://picsum.photos/seed/brand{$id}/300/300",
                    'is_active' => true
                ]
            );
        }
    }
}
