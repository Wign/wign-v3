<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->locale,
            'text' => $this->faker->word,
        ];
    }

    public function text()
    {
        return $this->state(function () {
            return [
                'type' => 'TEXT'
            ];
        });
    }

    public function sign()
    {
        return $this->state(function () {
            return [
                'type' => 'SIGN'
            ];
        });
    }
}
