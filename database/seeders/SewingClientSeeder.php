<?php

namespace Database\Seeders;

use App\Models\SewingClient;
use Illuminate\Database\Seeder;

class SewingClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SewingClient::factory(100)->create();
    }
}
