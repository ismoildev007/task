<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Customer::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'address' => '123 Main Street',
            'phone' => '1234567890',
        ]);
        Customer::factory()->count(1000)->create();
    }
}
