<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10)
        ];
    }
}
