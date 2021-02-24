<?php

namespace Database\Factories;

use App\Models\Sign;
use App\Models\User;
use App\Models\Word;
use App\Providers\FakerProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new FakerProvider($this->faker));

        $url = '//www.cameratag.com/';
        $videoUUID = $this->faker->unique()->videoUuid; // ATTENTION! It only contains 100 unique entities. Otherwise use $faker->unique()->uuid;

        return [
            'video_uuid' => $videoUUID,
            'video_url' => $url . 'videos/' . $videoUUID . '/qvga/mp4.mp4',
            'thumbnail_url' => $url . 'assets/' . $videoUUID . '/vga_thumb.png',
            'small_thumbnail_url' => $url . 'assets/' . $videoUUID . '/qvga_thumb.jpg',
            'playings' => $this->faker->numberBetween(0, 1000),
            'sign_language_id' => 2,
            'word_id' => Word::factory()
        ];
    }
}
