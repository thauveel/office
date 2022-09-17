<?php

namespace Database\Factories\Hrm;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hrm\WorkSite>
 */
class WorkSiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => 'UC',
            'name' =>'Ungoofaaru Council',
            'created_at' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s')
        ];
    }
}
