<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'author' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(687, 1031),
            'content' => $this->faker->text(2000),
            'description' => $this->faker->text(),
            'likes' => $this->faker->numberBetween(),
            'is_published' => $this->faker->numberBetween(0, 1),
            'category_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
