<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Database\ContatcsSeeder;
use Database\Seeders\ContactsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ContactsSeeder::class,
        ]);
    }
}
