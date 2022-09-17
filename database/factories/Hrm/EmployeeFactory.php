<?php

namespace Database\Factories\Hrm;

use App\Models\Hrm\Job;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hrm\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'staff_id' => $this->faker->unique()->numberBetween(1001,1099),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'nid' => 'A'. $this->faker->unique()->numberBetween(100001,399999),
            'joined_date' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'merital_status' => $this->faker->randomElement(['unkown','single', 'married','widowed','separated']),
            'email' => $this->faker->safeEmail(),
            'biometric_device_id' => $this->faker->unique()->numberBetween(1001,1099),
            'job_id' => Job::all()->random()->id,
            'is_active' => true
        ];
    }
}
