<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $departments = [
            'Mathematics',
            'Physics',
            'Computer Science',
            'Social Science',
            'Geology',
            'ICH',
            'Mass Communication',
            'Fine Arts'
        ];

        $genders = ['male', 'female'];

        return [
            'next_of_kin_phone' => fake()->phoneNumber(),
            'next_of_kin_name' => fake()->name(),
            'address' => fake()->address(),
            'gender' => $genders[rand(0, count($genders) - 1)],
            'passport' => 'img1.png',
            'surname' => fake()->firstName(),
            'first_name' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'reg_no' => '20' . rand(16, 23) . rand(109, 782) . rand(100, 999),
            'department' => $departments[rand(0, count($departments) - 1)],
            'state_of_origin' => fake()->city(),
            'email' => fake()->unique()->safeEmail(),
            'campus' => 'ifite',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
