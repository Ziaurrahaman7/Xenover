<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'name'=>$this->faker->name(),
            'category_id'=>$this->faker->randomNumber(),
            'company_id'=>$this->faker->randomNumber(),
            'image'=>$this->faker->name(),
            'price'=>$this->faker->randomNumber(),
            'sku'=>$this->faker->word(),
            'quantity'=>$this->faker->word(),
            'details'=>$this->faker->paragraph(),
        ];
    }
}
