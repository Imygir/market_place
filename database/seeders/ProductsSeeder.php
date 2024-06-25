<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Продукт 1',
                'price' => 10.5,
                'category_id' => 1,
            ],
            [
                'name' => 'Продукт 2',
                'price' => 12,
                'category_id' => 3,
            ],
            [
                'name' => 'Продукт 3',
                'price' => 14.7,
                'category_id' => 4,
            ],
            [
                'name' => 'Продукт 4',
                'price' => 190,
                'category_id' => 4,
            ],
            [
                'name' => 'Продукт 5',
                'price' => 13.9,
                'category_id' => 3,
            ],
            [
                'name' => 'Продукт 6',
                'price' => 12.1,
                'category_id' => 2,
            ],
            [
                'name' => 'Продукт 7',
                'price' => 18,
                'category_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
