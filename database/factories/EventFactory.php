<?php

namespace Database\Factories;

use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = EventCategory::factory()->create();

        return [
            'title' => $this->faker->sentence(4),
            'image' => $this->faker->imageUrl(),
            'body' => $this->faker->text(),
            'category_id' => $category->id,
        ];
    }
}
