<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
        return [
            'name' => fake()->randomElement([
                'User 1',
                'User 6',
                'User 7',
                'User 8',
                'User 9',
                'User 10',
                'User 11',
                'User 12',
                'User 13',
                'User 14',
                'User 15',
                'User 2',
                'User 3',
                'User 4',
                'User 5'
            ]),
            'email' => fake()->randomElement([
                'user-1@test.com',
                'user-2@test.com',
                'user-3@test.com',
                'user-4@test.com',
                'user-5@test.com',
                'user-6@test.com',
                'user-7@test.com',
                'user-8@test.com',
                'user-9@test.com',
                'user-10@test.com',
                'user-11@test.com',
                'user-12@test.com',
                'user-13@test.com',
                'user-14@test.com',
                'user-15@test.com',
            ]),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
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
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
