<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        OrderItem::create([
            'order_id' => $order->id ?? 1,
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => 5,
            'price' => 50.00
        ]);

        OrderItem::factory()->count(1000)->create();
    }
}
