<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'postnr' => $this->faker->postcode,
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2010-01-01')->format('Y'),
            'last_login' => now(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'public' => TRUE,
            'sign_language_id' => 2,
            'text_language_id' => 1,
            'remember_token' => Str::random(10),
        ];
    }

    public function hidden()
    {
        return $this->state(function (array $attributes) {
            return [
                'public' => FALSE
            ];
        });
    }
}
