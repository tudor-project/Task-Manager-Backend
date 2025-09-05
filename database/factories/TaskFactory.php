<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),   // un titlu random
            'slug' => $this->faker->slug,           // slug unic
            'description' => $this->faker->paragraph, // text random
            'priority' => $this->faker->numberBetween(0, 2), // 1-5
            'status' => $this->faker->randomElement([0, 1]), // 0 = pending, 1 = done
            'project_id' => 31 // legat de proiectul cu ID 31
        ];
    }
}
