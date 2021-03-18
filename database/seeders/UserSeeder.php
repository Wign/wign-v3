<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\Sign;
use App\Models\User;
use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'             => 'Admin',
            'email'            => 'admin@wign.dk',
            'password'         => Hash::make('password'),
            'sign_language_id' => 2,
            'text_language_id' => 1,
        ]);

        User::factory()->create([
            'name'             => 'User',
            'email'            => 'user@wign.dk',
            'password'         => Hash::make('password'),
            'sign_language_id' => 2,
            'text_language_id' => 1,
        ]);

        // 10 Lurkers (People with no content creations whatsoever)
        User::factory()->count(10)->create(['sign_language_id' => 2, 'text_language_id' => 1]);
    }
}
