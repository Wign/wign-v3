<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            UserSeeder::class,
            TranslationSeeder::class,
            LikeSeeder::class,
            RequestSeeder::class,
            ViewsSeeder::class,
            //ArtistSeeder::class
        ]);
    }
}
