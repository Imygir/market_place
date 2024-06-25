<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Категория 1',
                'parent_id' => null, // это корневая категория, поэтому parent_id равен null
                'sort_order' => 1,
            ],
            [
                'name' => 'Подкатегория 1.1',
                'parent_id' => 1, // parent_id указывает на родительскую категорию
                'sort_order' => 1,
            ],
            [
                'name' => 'Подкатегория 1.2',
                'parent_id' => 1,
                'sort_order' => 2,
            ],
            [
                'name' => 'Категория 2',
                'parent_id' => null,
                'sort_order' => 2,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
