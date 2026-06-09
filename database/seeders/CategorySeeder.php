<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Electronic devices and gadgets',
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'Accessories and tools',
            ],
            [
                'name' => 'Software',
                'slug' => 'software',
                'description' => 'Software and applications',
            ],
            [
                'name' => 'Books',
                'slug' => 'books',
                'description' => 'Books and educational materials',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
