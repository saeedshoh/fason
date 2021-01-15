<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'address' => $this->faker->address,
            'quantity' => $this->faker->randomDigit,
            'total' => $this->faker->randomDigit,
            'margin' => $this->faker->randomDigit,
            'order_status_id' => OrderStatus::all()->random()->id
        ];
    }
}
