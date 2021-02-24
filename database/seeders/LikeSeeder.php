<?php

namespace Database\Seeders;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::inRandomOrder()->take(10)->get()->each(function (User $user) {
            $numLikes = rand(0, 10);
            Sign::inRandomOrder()->take($numLikes)->get()->each(function (Sign $sign) use ($user) {
                $sign->likes()->attach($user);
            });
        });
    }
}
