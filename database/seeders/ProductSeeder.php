<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Child of God Black',
                'price' => 35000,
                'description' => 'Heavy Material (250 GSM), 100% cotton, Boxy Fit',
                'image' => 'feature_prod_01.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Midnight Rider Longsleeve',
                'price' => 40000,
                'description' => 'Heavy Material (250 GSM), 100% cotton, Boxy Fit',
                'image' => 'feature_prod_02.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Eternal Voices Black',
                'price' => 35000,
                'description' => 'Heavy Material (250 GSM), 100% cotton, Boxy Fit',
                'image' => 'feature_prod_03.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Midnight Rider Shortsleeve',
                'price' => 35000,
                'description' => 'Heavy Material (250 GSM), 100% cotton, Boxy Fit',
                'image' => 'feature_prod_04.jpg',
                'is_featured' => false,
            ],
            [
                'name' => 'Countdown White Tank',
                'price' => 35000,
                'description' => 'Heavy Material (250 GSM), 100% cotton, Boxy Fit',
                'image' => 'feature_prod_05.jpg',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                [
                    'name' => $product['name'],
                    'category' => 'Apparel',
                    'price' => $product['price'],
                    'description' => $product['description'],
                    'material' => '100% cotton, 250 GSM, Boxy Fit',
                    'image' => $product['image'],
                    'is_featured' => $product['is_featured'],
                    'is_published' => true,
                ]
            );
        }
    }
}
