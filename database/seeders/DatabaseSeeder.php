<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BelumMenikahSeeder::class,
            TidakMampuSeeder::class,
            KeteranganUsahaSeeder::class,
            KeteranganAhliWarisSeeder::class,
            KematianSeeder::class,
            KelakuanBaikSeeder::class,
        ]);
    }
}
