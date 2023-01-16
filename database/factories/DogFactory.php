<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'introduction' => $this->faker->text(10),
            'breed' => $this->faker->text(),
            'gender' => $this->faker->numberBetween(1, 2),
            'date_of_birth' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
        ];
    }
}
