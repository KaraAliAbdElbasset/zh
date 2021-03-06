<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'khaled',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ]);

        $this->call(ClubSeeder::class);
        $this->call(SewingClientSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
