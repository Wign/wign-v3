<?php

namespace Database\Factories;

use App\Models\Description;
use App\Models\Sign;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Description::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'text'     => $faker->textWithHashtag(), Later...
            'text' => $this->faker->realText(),
            'sign_id' => Sign::factory()
        ];
    }
}
