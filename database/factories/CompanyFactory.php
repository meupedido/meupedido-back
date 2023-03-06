<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cnpj' => 00000000000000,
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'whatsapp' => $this->faker->phoneNumber(),
            'minimum_order' => 25,
            'delivery_fee' => 5,
            'branch_id' => $this->faker->numberBetween(1, 15),
            'payment_methods' => 'dinheiro, pix, cartao',
        ];
    }
}
