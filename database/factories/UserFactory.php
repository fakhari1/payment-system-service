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
                'کاربر 1',
                'کاربر 6',
                'کاربر 7',
                'کاربر 8',
                'کاربر 9',
                'کاربر 10',
                'کاربر 11',
                'کاربر 12',
                'کاربر 13',
                'کاربر 14',
                'کاربر 15',
                'کاربر 2',
                'کاربر 3',
                'کاربر 4',
                'کاربر 5'
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
