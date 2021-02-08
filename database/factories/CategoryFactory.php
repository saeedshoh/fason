<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'icon' => 'img/2020/11/rMtrTPdv9thzYXoZ69SJISUATJTO4f67EWc0iJti.svg',
            'is_active' => '1',
            'slug' => $this->faker->word,
            'parent_id' => 0,
            'order_no' => 1
        ];
    }
}
