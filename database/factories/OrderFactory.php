<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;
    public function definition(): array
    {
        $customer = Customer::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        return [
            'customer_id' => $customer->id,
            'user_id' => $user->id,
            'order_date' => fake()->date(),
            'status' => fake()->sentence(),
            'total_price' => fake()->randomFloat(12, 2300, 5400)
        ];
    }
}
