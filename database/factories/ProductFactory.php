<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'observation' => $this->faker->sentence(),
            'path_img' => 'img_default.png',
            'price' => $this->faker->randomDigit(),
            'on_sale' => 1,
            'is_avaliable' => 1,
            'category_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
