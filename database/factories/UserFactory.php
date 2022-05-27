<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dateOfBirth = $this->faker->dateTimeBetween('01-01-1980', '31-12-2000')->format('Y-m-d');

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'date_of_birth' => $dateOfBirth,
            'age' => Carbon::parse($dateOfBirth)->age,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'annual_income' => mt_rand(10000,60000),


            'occupation' => $this->faker->randomElement(['Private Job','Government Job', 'Business']),

            'family_type' => $this->faker->randomElement(['Joint family', 'Nuclear family']),

            'Manglik' => $this->faker->randomElement(['Yes', 'No']),

            'preference_expected_income_min' => mt_rand(0,20000),
            'preference_expected_income_max' => mt_rand(0,60000),
            'preference_occupation' => $this->faker->randomElement(['Private Job','Government Job', 'Business']),


            'preference_family_type' => $this->faker->randomElement(['Joint family', 'Nuclear family']),

            'preference_manglik' => $this->faker->randomElement(['Yes', 'No']),


        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
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
