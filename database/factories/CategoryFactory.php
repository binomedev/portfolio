<?php

namespace Binomedev\Portfolio\Database\Factories;

use Binomedev\Portfolio\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words,
            'summary' => $this->faker->paragraph,
            'tags' => implode(', ', $this->faker->words(random_int(1, 5))),
        ];
    }
}

