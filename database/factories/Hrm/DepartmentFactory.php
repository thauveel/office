<?php

namespace Database\Factories\Hrm;

use App\Models\Hrm\WorkSite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
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
            'alias' => $this->faker->unique()->randomElement(['AI', 'FV','SD','WT']),
            'email' => $this->faker->safeEmail(),
            'work_site_id' => WorkSite::all()->random()->id,
            'created_at' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s')
        ];
    }
}
