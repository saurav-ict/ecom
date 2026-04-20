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
            $slug = \Illuminate\Support\Str::slug($name);
            $imageName = 'brands/' . $slug . '.png';
            
            if (!\Illuminate\Support\Facades\Storage::disk('public')->exists('brands')) {
                \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('brands');
            }
            if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($imageName)) {
                $bg = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                $imageUrl = "https://placehold.co/200x200/{$bg}/FFFFFF.png?text=" . urlencode($name);
                $imageContent = @file_get_contents($imageUrl);
                if ($imageContent) {
                    \Illuminate\Support\Facades\Storage::disk('public')->put($imageName, $imageContent);
                }
            }

            Brand::updateOrCreate(
                ['name' => $name],
                [
                    'is_active' => true,
                    'logo' => $imageName
                ]
            );
        }
    }
}
