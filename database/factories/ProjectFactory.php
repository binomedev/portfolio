<?php

namespace Binomedev\Portfolio\Database\Factories;

use Binomedev\Portfolio\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'summary' => $this->faker->paragraph,
            'content' => $this->faker->paragraph(),
            'tags' => implode(', ', $this->faker->words(random_int(1, 5))),
        ];
    }
}

