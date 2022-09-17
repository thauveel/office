<?php

namespace Database\Factories\Hrm;

use Illuminate\Support\Str;
use App\Models\Hrm\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'code' => $this->faker->unique()->randomElement(['1101', '1102','1103','1104']),
            'department_id' => Department::all()->random()->id,
            'created_at' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s')
        ];
    }
}
