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
            'name' => 'Admin',
            'email' => 'admin@wign.dk',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@wign.dk',
            'password' => Hash::make('password'),
        ]);

        // 10 Lurkers (People with no content creations whatsoever)
        User::factory()->count(10)->create();
    }
}
