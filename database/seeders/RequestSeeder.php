<?php

namespace Database\Seeders;

use App\Models\Sign;
use App\Models\User;
use App\Models\Word;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::inRandomOrder()->take(10)->get()->each(function (User $user) {
            $numRequests = rand(0, 10);
            Word::factory()->count($numRequests)->create(['creator_id' => $user->id, 'editor_id' => $user->id])->each(function (Word $word) use ($user) {
                $word->requests()->attach($user);
            });
        });
    }
}
