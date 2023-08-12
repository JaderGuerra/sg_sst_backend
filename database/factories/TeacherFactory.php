<?php

namespace Database\Factories;

use App\Models\Teacher\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{

    protected $model = Teacher::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id" => $this->faker->uuid(),
            "name" => $this->faker->name(),
            "identification" => $this->faker->randomNumber(8, true),
            "email" => $this->faker->unique()->safeEmail(),
        ];
    }
}
