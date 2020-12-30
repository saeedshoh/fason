<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class storeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = store::class;

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
            'address' => $this->faker->address,
            'avatar' => 'Mado',
            'cover' => 'Mado',
            'user_id' => 1,
            'city_id' => 1,
            'is_active' => '1',
        ];
    }
}
