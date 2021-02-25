<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Word;
use App\Providers\FakerProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class WordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Word::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new FakerProvider($this->faker));

        return [
            'literal' => $this->faker->unique()->wignLiterals,
            'language_id' => 1,
            'creator_id' => User::factory(),
            'editor_id' => function (array $attributes) {
                return $attributes['creator_id'];
            }
        ];
    }
}
