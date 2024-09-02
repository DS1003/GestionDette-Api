<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Client::factory(10)->create()->each(function ($client) {
            \App\Models\User::factory()->create(['client_id' => $client->id]);
        });
    }
}
