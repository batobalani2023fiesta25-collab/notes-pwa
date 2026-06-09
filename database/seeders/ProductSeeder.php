<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return;
        }

        $products = [
            [
                'name' => 'Laptop Computer',
                'description' => 'High-performance laptop with 16GB RAM',
                'price' => 1299.99,
                'stock' => 15,
                'category_id' => $categories->firstWhere('slug', 'electronics')->id ?? 1,
                'sku' => 'LAP-001',
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with precision tracking',
                'price' => 29.99,
                'stock' => 50,
                'category_id' => $categories->firstWhere('slug', 'accessories')->id ?? 2,
                'sku' => 'MOUSE-001',
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB Mechanical keyboard with customizable switches',
                'price' => 149.99,
                'stock' => 25,
                'category_id' => $categories->firstWhere('slug', 'accessories')->id ?? 2,
                'sku' => 'KEY-001',
            ],
            [
                'name' => '27" 4K Monitor',
                'description' => 'Ultra-high resolution 4K monitor for professionals',
                'price' => 599.99,
                'stock' => 10,
                'category_id' => $categories->firstWhere('slug', 'electronics')->id ?? 1,
                'sku' => 'MON-001',
            ],
            [
                'name' => 'USB-C Hub',
                'description' => 'Multi-port USB-C hub with multiple connectivity options',
                'price' => 79.99,
                'stock' => 30,
                'category_id' => $categories->firstWhere('slug', 'accessories')->id ?? 2,
                'sku' => 'HUB-001',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
