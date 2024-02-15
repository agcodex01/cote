<?php

namespace Database\Factories;

use App\Consts\UserConstant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_number' => $this->faker->numberBetween(10000000),
            'user_id' => User::factory()->create([
                'type' => UserConstant::STUDENT
            ])
        ];
    }
}
