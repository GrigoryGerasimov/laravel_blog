<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => $this->faker->numberBetween(1, 300),
            'tag_id' => $this->faker->numberBetween(1, 30)
        ];
    }
}
