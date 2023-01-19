<?php

namespace Database\Seeders;

use Database\Seeders\DogSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\EventCategorySeeder;

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
            DogSeeder::class,
            EventCategorySeeder::class
        ]);
    }
}
