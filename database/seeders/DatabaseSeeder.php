<?php

namespace Database\Seeders;

use Database\Seeders\DogSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\UsersSeeder;

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
            UsersSeeder::class,
            EventSeeder::class,
            DogSeeder::class
        ]);
    }
}
