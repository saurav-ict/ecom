<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Nike', 'Adidas', 'Puma', 'Reebok',
            'Under Armour', 'New Balance', 'Converse', 'Vans',
        ];

        foreach ($brands as $name) {
            Brand::updateOrCreate(
                ['name' => $name],
                ['is_active' => true]
            );
        }
    }
}
