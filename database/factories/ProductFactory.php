<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph($nbSentences = 4, $variableNbSentences = true),
            'image' => '/2020/12/5fd47be2396d0480x480.jpg',
            'gallery' => "[\"2020\\/12\\/5fd306ef0b426800x800.jpg\",\"2020\\/12\\/5fd306ef0b426800x800.jpg\",\"2020\\/12\\/5fd306ef0b426800x800.jpg\",\"2020\\/12\\/5fd306ef0b426800x800.jpg\",\"2020\\/12\\/5fd306ef0b426800x800.jpg\"]",
            'category_id' => Category::all()->random()->id,
            'quantity' =>  $this->faker->numberBetween($min = 1, $max = 100),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000),
            'product_status_id' => '2',
            'store_id' => 1,
        ];
    }
}
