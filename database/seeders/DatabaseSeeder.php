<?php

namespace Database\Seeders;

use Database\Seeders\BookSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
        ]);
    }
}