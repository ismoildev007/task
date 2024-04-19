<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $category = Category::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        Product::create([
            'name' => 'Example Product',
            'price' => 50.00,
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => $category->id ?? 1,
            'user_id' => $user->id ?? 1,
            'image_url' => 'example.jpg'
        ]);

        Product::factory()->count(10000)->create();
    }
}
