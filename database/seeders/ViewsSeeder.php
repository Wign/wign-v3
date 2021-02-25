<?php

namespace Database\Seeders;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Database\Seeder;

class ViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::inRandomOrder()->take(10)->get()->each(function (User $user) {
            $numViews = rand(0, 10);
            Sign::inRandomOrder()->take($numViews)->get()->each(function (Sign $sign) use ($user) {
                $viewSign = rand(1, 4);
                for ($i = 0; $i < $viewSign; $i++) {
                    $sign->views()->attach($user);
                }
            });
        });
    }
}
