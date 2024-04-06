<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $gender = fake()->randomElement(['Male', 'Female']);
        $email = strtolower($first_name[0]) . strtolower($last_name) . '@gmail.com';

        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender,
            'email' => $email,
        ];
    }
}
