<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrderItem::class;
    public function definition(): array
    {
        $order = Order::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => fake()->randomNumber(),
            'price' => $this->faker->randomFloat(2, 10, 1000)
        ];
    }
}
