<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
