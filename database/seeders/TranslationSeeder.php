<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\Sign;
use App\Models\User;
use App\Models\Word;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 10 creators 1 video each
        $this->createTranslations(10, 1);

        // 2 creators 10 video each
        $this->createTranslations(2, 10);
    }

    public function createTranslations(int $countUser, int $countTranslations) {
        User::factory()->count($countUser)->create()->each(function (User $user) use ($countTranslations) {

            for($i = 0; $i < $countTranslations; $i++) {
                $word = Word::factory()->create(['creator_id' => $user->id, 'editor_id' => $user->id]);
                $sign = Sign::factory()->create(['creator_id' => $user->id, 'word_id' => $word->id]);
                Description::factory()->create(['sign_id' => $sign->id]);
            }
        });
    }
}
